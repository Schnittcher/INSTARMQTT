<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/SymconModulHelper/VariableProfileHelper.php';

class InstarBaseModule extends IPSModule
{
    use VariableProfileHelper;

    public function Create()
    {
        parent::Create();
        $this->ConnectParent('{C6D2AEB3-6E1F-4B2E-8E69-3A1A00246850}');

        $this->RegisterPropertyString('MQTTTopicPraefix', '');
        $this->RegisterPropertyString('MQTTKlientID', '');

        $Variables = [];
        $i = 0;
        foreach (static::$Variables as $Ident => $Variable) {
            $Variables[] = [
                'Ident'        => $Ident,
                'Name'         => $this->Translate($Variable[0]),
                'VarType'      => $Variable[1],
                'Profile'      => $Variable[2],
                'Action'       => $Variable[3],
                'Pos'          => $i,
                'Keep'         => $Variable[4]
            ];
            $i++;
        }
        $this->RegisterPropertyString('Variables', json_encode($Variables));
    }

    public function ApplyChanges()
    {
        parent::ApplyChanges();
        $this->ConnectParent('{C6D2AEB3-6E1F-4B2E-8E69-3A1A00246850}');

        $NewRows = static::$Variables;
        $NewPos = 0;
        $Variables = json_decode($this->ReadPropertyString('Variables'), true);
        foreach ($Variables as $Variable) {
            $VariableActive = $Variable['Keep'];

            $this->MaintainVariable($Variable['Ident'], $Variable['Name'], $Variable['VarType'], $Variable['Profile'], $Variable['Pos'], $VariableActive);
            if ($Variable['Action'] && $VariableActive) {
                $this->EnableAction($Variable['Ident']);
            }
            foreach ($NewRows as $NewRowIdent => $Row) {
                if ($Variable['Ident'] == $NewRowIdent) {
                    unset($NewRows[$NewRowIdent]);
                }
            }
            if ($NewPos < $Variable['Pos']) {
                $NewPos = $Variable['Pos'];
            }
        }

        if (count($NewRows) != 0) {
            foreach ($NewRows as $NewRowIdent => $NewVariable) {
                $Variables[] = [
                    'Ident'        => $NewRowIdent,
                    'Name'         => $this->Translate($NewVariable[0]),
                    'VarType'      => $NewVariable[1],
                    'Profile'      => $NewVariable[2],
                    'Action'       => $NewVariable[3],
                    'Pos'          => ++$NewPos,
                    'Keep'         => $NewVariable[4]
                ];
            }
            IPS_SetProperty($this->InstanceID, 'Variables', json_encode($Variables));
            IPS_ApplyChanges($this->InstanceID);
            return;
        }

        //Setze Filter für ReceiveData
        $MQTTTopic = $this->ReadPropertyString('MQTTTopicPraefix') . '/' . $this->ReadPropertyString('MQTTKlientID') . '/status/' . static::SUBTOPIC;
        $this->SetReceiveDataFilter('.*' . $MQTTTopic . '.*');
    }

    public function resetVariables()
    {
        $NewRows = static::$Variables;
        $Variables = [];
        $i = 0;
        foreach ($NewRows as $Ident => $Variable) {
            $Variables[] = [
                'Ident'        => $Ident,
                'Name'         => $this->Translate($Variable[0]),
                'VarType'      => $Variable[1],
                'Profile'      => $Variable[2],
                'Action'       => $Variable[3],
                'Pos'          => $i,
                'Keep'         => $Variable[4]
            ];
            $i++;
        }
        IPS_SetProperty($this->InstanceID, 'Variables', json_encode($Variables));
        IPS_ApplyChanges($this->InstanceID);
        return;
    }

    public function ReceiveData($JSONString)
    {
        $this->SendDebug('ReceiveData :: JSON', $JSONString, 0);

        if (!empty($this->ReadPropertyString('MQTTTopicPraefix')) && (!empty($this->ReadPropertyString('MQTTKlientID')))) {
            $Buffer = json_decode($JSONString, true);
            //Für MQTT Fix in IPS Version 6.3
            if (IPS_GetKernelDate() > 1670886000) {
                $Buffer['Payload'] = utf8_decode($Buffer['Payload']);
            }

            $this->SendDebug('ReceiveData :: JSON Payload', $Buffer['Payload'], 0);
            $Payload = json_decode($Buffer['Payload'], true);
            if (array_key_exists('Topic', $Buffer)) {
                if (preg_match('~/status/' . static::SUBTOPIC . '/(.*)~', $Buffer['Topic'], $matches)) {
                    $Endpoint = $matches[1];
                    $Ident = $this->getTopicFromArray(static::$Variables, $Endpoint);
                    if ($Ident == false) {
                        return;
                    }
                    switch (static::$Variables[$Ident][1]) {
                        case VARIABLETYPE_BOOLEAN:
                            if (array_key_exists('val', $Payload)) {
                                $this->SetValue($Ident, boolval($Payload['val']));
                            }
                            break;
                        case VARIABLETYPE_INTEGER:
                            switch (static::$Variables[$Ident][2]) {
                                case '~HexColor':
                                    if (array_key_exists('val', $Payload)) {
                                        $this->SetValue($Ident, hexdec($Payload['val']));
                                    }
                                    break;
                                default:
                                    if (array_key_exists('val', $Payload)) {
                                        $this->SetValue($Ident, intval($Payload['val']));
                                    }
                                    break;
                            }
                            break;
                        case VARIABLETYPE_FLOAT:
                            if (array_key_exists('val', $Payload)) {
                                $this->SetValue($Ident, floatval($Payload['val']));
                            }
                            break;
                        case VARIABLETYPE_STRING:
                            if (array_key_exists('val', $Payload)) {
                                $this->SetValue($Ident, strval($Payload['val']));
                            }
                            break;
                        default:
                            $this->SendDebug(__FUNCTION__ . ' :: Switch/Case Default', static::$Variables[$Ident][1]);
                            break;
                    }
                }
            }
        }
    }

    public function RequestAction($Ident, $Value)
    {
        $Payload = [];
        $Payload['val'] = '';
        $Topic = $this->ReadPropertyString('MQTTTopicPraefix') . '/' . $this->ReadPropertyString('MQTTKlientID') . '/' . static::SUBTOPIC . '/';

        switch (static::$Variables[$Ident][1]) {
            case VARIABLETYPE_BOOLEAN:
                $Payload['val'] = strval(intval($Value));
                break;
            case VARIABLETYPE_INTEGER:
                if (static::$Variables[$Ident][2] == '~HexColor') {
                    $color = strval(dechex($Value));
                    if ($color == '0') {
                        $color = str_pad($color, 6, '0');
                    }
                    $Payload['val'] = $color;
                    break;
                }
                $Payload['val'] = strval($Value);
                break;
            default:
                $Payload['val'] = strval($Value);
                break;
        }
        $Topic .= static::$Variables[$Ident][5];
        $this->SendMQTT($Topic, json_encode($Payload));
    }

    protected function SetValue($Ident, $Value)
    {
        if (@$this->GetIDForIdent($Ident)) {
            $this->SendDebug('SetValue :: ' . $Ident, $Value, 0);
            parent::SetValue($Ident, $Value);
        }
    }

    protected function sendMQTT($Topic, $Payload)
    {
        $result = true;

        $Buffer['DataID'] = '{043EA491-0325-4ADD-8FC2-A30C8EEB4D3F}';
        $Buffer['PacketType'] = 3;
        $Buffer['QualityOfService'] = 0;
        $Buffer['Retain'] = false;
        $Buffer['Topic'] = $Topic;
        $Buffer['Payload'] = $Payload;
        $BufferJSON = json_encode($Buffer, JSON_UNESCAPED_SLASHES);
        $BufferJSON = json_encode($Buffer);
        $this->SendDebug(__FUNCTION__ . ' :: JSON', $BufferJSON, 0);
        $result = @$this->SendDataToParent($BufferJSON);

        if ($result === false) {
            $last_error = error_get_last();
            echo $last_error['message'];
        }
    }

    protected function getTopicFromArray($variables, $topic)
    {
        foreach ($variables as $index => $variable) {
            if ($variable[5] == $topic) {
                return $index;
            }
        }
        $this->SendDebug(__FUNCTION__ . ' :: Missing Endpoint', $topic, 0);
        return false;
    }
}