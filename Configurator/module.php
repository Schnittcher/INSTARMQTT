<?php

declare(strict_types=1);

class Configurator extends IPSModule
{
    private $instarInstances = [
        'Alarm'      => '{9D7A1DF0-E916-8F82-CFE8-10AA6EA1815C}',
        'Features'   => '{382FCB6E-A0E7-7133-14D3-71C750284F29}',
        //'Multimedia' => '{A8E45229-0BF9-FDEF-E56A-6A441EE58244}',
        'Netzwerk'   => '{6D738634-5546-92CE-E7CA-5B85965D032F}',
        //'SmartHome'  => '{B6E25B27-E300-E817-6332-ECC0F4CFCA4E}',
        'System'     => '{60EC7692-2116-05DC-1D18-3803FC418F55}',
        //'Tasks'      => '{335879D8-B273-AE04-7C06-55A1D70F4739}',
        'Camera'     => '{6EA51045-0E79-4541-85D7-0A1CB9DDF0C5}',
    ];

    public function Create()
    {
        //Never delete this line!
        parent::Create();
        $this->ConnectParent('{C6D2AEB3-6E1F-4B2E-8E69-3A1A00246850}');
        $this->RegisterAttributeString('Cams', '{}');
    }

    public function ApplyChanges()
    {
        //Never delete this line!
        parent::ApplyChanges();

        $this->SetReceiveDataFilter('instar');
    }

    public function addCam($Host, $Username, $Password)
    {
        $cams = json_decode($this->ReadAttributeString('Cams'), true);

        $tmpValue = [
            'Host'     => $Host,
            'Username' => $Username,
            'Password' => $Password,
        ];
        array_push($cams, $tmpValue);
        $this->WriteAttributeString('Cams', json_encode($cams));
        $this->ReloadForm();
    }

    public function GetConfigurationForm()
    {
        $Form = json_decode(file_get_contents(__DIR__ . '/form.json'), true);
        $cams = json_decode($this->ReadAttributeString('Cams'), true);

        $Values = [];
        $i = 1;
        foreach ($cams as $cam) {
            $mqttConfig = $this->getMqttSettingsFromCam($cam['Host'], $cam['Username'], $cam['Password']);
            $camInfos = $this->getModelFromCam($cam['Host'], $cam['Username'], $cam['Password']);

            //Model for Stream

            switch ($camInfos['model']) {
                case 'INSTAR 2K+':
                case 'INSTAR WQHD':
                    $model = 'from 2k+';
                break;
                default:
                    $model = 'from hd';
            }

            $Values[] = [
                'id'            => $i,
                'IPAddress'     => $cam['Host'],
                'Username'      => $cam['Username'],
                'Password'      => $cam['Password'],
                'CamName'       => $camInfos['name'],
                'Model'         => $camInfos['model'],
                'InstanceName'  => '',
            ];
            foreach ($this->instarInstances as $key => $instance) {
                if ($key != 'Camera') {
                    $Values[] = [
                        'parent'       => $i,
                        'IPAddress'    => $key,
                        'InstanceName' => '', //InstanceName der Instanz, wenn diese angelegt ist
                        'instanceID'   => $this->getInstanceID($instance, $mqttConfig),
                        'create'       => [
                            'moduleID'      => $instance,
                            'name'          => $camInfos['name'] . ' ' . $key,
                            'configuration' => [
                                'MQTTTopicPraefix' => $mqttConfig['mq_prefix'],
                                'MQTTKlientID'     => $mqttConfig['mq_clientid'],
                            ]

                        ]
                    ];
                } else {
                    $Values[] = [
                        'parent'       => $i,
                        'IPAddress'    => $key,
                        'InstanceName' => '', //InstanceName der Instanz, wenn diese angelegt ist
                        'instanceID'   => $this->getInstanceID($instance, $mqttConfig),
                        'create'       => [
                            'moduleID'      => $instance,
                            'name'          => $camInfos['name'] . ' ' . $key,
                            'configuration' => [
                                'MQTTTopicPraefix' => $mqttConfig['mq_prefix'],
                                'MQTTKlientID'     => $mqttConfig['mq_clientid'],
                                'Host'             => $cam['Host'],
                                'Username'         => $cam['Username'],
                                'Password'         => $cam['Password'],
                                'Model'            => $model,
                            ]

                        ]
                    ];
                }
            }
            $i++;
        }
        $Form['actions'][1]['values'] = $Values;
        return json_encode($Form);
    }

    public function deleteCam($selectedItem)
    {
        $cams = json_decode($this->ReadAttributeString('Cams'), true);
        foreach ($cams as $key => $cam) {
            if ($cam['Host'] == $selectedItem) {
                unset($cams[$key]);
                array_values($cams);
            }
        }
        $this->WriteAttributeString('Cams', json_encode($cams));
        $this->ReloadForm();
    }

    private function getModelFromCam($Host, $User, $Password)
    {
        {

            $info = [
                'model'   => '',
                'name'    => '',
            ];

            $url = 'http://' . $User . ':' . $Password . '@' . $Host . '/param.cgi?cmd=getserverinfo';
            $ch = curl_init();
            $timeout = 5;

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

            $result = curl_exec($ch);
            $curl_errno = curl_errno($ch);
            $curl_error = curl_error($ch);
            curl_close($ch);

            IPS_LogMessage('test', $result);
            if ($curl_errno == 0) {
                $result = explode(';', $result);
                unset($result[count($result) - 1]); //letzten Wert entfernen (leerzeile)
                foreach ($result as $value) {
                    $value = str_replace(["\r\n", "\n", "\r"], '', $value);
                    list($key, $val) = explode('=', $value);
                    $info[$key] = str_replace('"', '', $val);
                }
            }
            return $info;
        }
    }

    private function getMqttSettingsFromCam($Host, $User, $Password)
    {
        $mqtt = [
            'mq_prefix'   => '',
            'mq_clientid' => '',
        ];

        $url = 'http://' . $User . ':' . $Password . '@' . $Host . '/param.cgi?cmd=getmqttattr';
        $ch = curl_init();
        $timeout = 5;

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

        $result = curl_exec($ch);
        $curl_errno = curl_errno($ch);
        $curl_error = curl_error($ch);
        curl_close($ch);

        if ($curl_errno == 0) {
            $result = explode(';', $result);
            unset($result[count($result) - 1]); //letzten Wert entfernen (leerzeile)
            foreach ($result as $value) {
                $value = str_replace(["\r\n", "\n", "\r"], '', $value);
                list($key, $val) = explode('=', $value);
                $mqtt[$key] = str_replace('"', '', $val);
            }
        }
        return $mqtt;
    }

    private function getInstanceID($GUID, $mqttConfig)
    {
        $InstanceIDs = IPS_GetInstanceListByModuleID($GUID);
        foreach ($InstanceIDs as $id) {
            if ((strtolower(IPS_GetProperty($id, 'MQTTTopicPraefix')) == strtolower($mqttConfig['mq_prefix'])) && (strtolower(IPS_GetProperty($id, 'MQTTKlientID')) == strtolower($mqttConfig['mq_clientid']))) {
                if (IPS_GetInstance($id)['ConnectionID'] === IPS_GetInstance($this->InstanceID)['ConnectionID']) {
                    return $id;
                } else {
                    return false;
                }
            }
        }
        return 0;
    }
}
