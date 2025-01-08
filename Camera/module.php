<?php

declare(strict_types=1);
    class Camera extends IPSModule
    {
        public function Create()
        {
            //Never delete this line!

            parent::Create();
            $this->ConnectParent('{C6D2AEB3-6E1F-4B2E-8E69-3A1A00246850}');

            $this->RegisterPropertyString('MQTTTopicPraefix', '');
            $this->RegisterPropertyString('MQTTKlientID', '');

            $this->RegisterPropertyString('Host', '');
            $this->RegisterPropertyString('Username', 'admin');
            $this->RegisterPropertyString('Password', '');
            $this->RegisterPropertyInteger('Resolution', 12);
            $this->RegisterPropertyString('Model', 'from 2k+');

            $MedienID = @IPS_GetMediaIDByName('Stream', $this->InstanceID);
            if ($MedienID == 0) {
                $MediaID = IPS_CreateMedia(3);
                IPS_SetParent($MediaID, $this->InstanceID);
                IPS_SetName($MediaID, $this->Translate('Stream'));
            }
        }

        public function Destroy()
        {
            //Never delete this line!
            parent::Destroy();
        }

        public function ApplyChanges()
        {
            //Never delete this line!
            parent::ApplyChanges();

            switch ($this->ReadPropertyString('Model')) {
                case 'from 2k+':
                     $StreamURL = 'rtsp://' . $this->ReadPropertyString('Username') . ':' . $this->ReadPropertyString('Password') . '@' . $this->ReadPropertyString('Host') . '/livestream/' . $this->ReadPropertyInteger('Resolution');
                    break;
                case 'from hd':
                $StreamURL = 'rtsp://' . $this->ReadPropertyString('Username') . ':' . $this->ReadPropertyString('Password') . '@' . $this->ReadPropertyString('Host') . '/' . $this->ReadPropertyInteger('Resolution');
                default:
                    # code...
                    break;
            }


            $MedienID = @IPS_GetMediaIDByName('Stream', $this->InstanceID);
            if ($MedienID > 0) {
                
                IPS_SetMediaFile($MedienID, $StreamURL, true);
            }
        }
    }