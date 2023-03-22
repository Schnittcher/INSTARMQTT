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

            @$this->MaintainVariable($Variable['Ident'], $Variable['Name'], $Variable['VarType'], $Variable['Profile'], $Variable['Pos'], $VariableActive);
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