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

            $MediaID = IPS_CreateMedia(3);
            IPS_SetParent($MediaID, $this->InstanceID);
            IPS_SetName($MediaID, $this->Translate('Stream'));
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

            $MedienID = @IPS_GetMediaIDByName('Stream', $this->InstanceID);
            if ($MedienID > 0) {
                $StreamURL = 'rtsp://'.$this->ReadPropertyString('Username') . ':' . $this->ReadPropertyString('Password') . '@' . $this->ReadPropertyString('Host') . '/livestream/' . $this->ReadPropertyInteger('Resolution');
                IPS_SetMediaFile($MedienID, $StreamURL, true);
            }
        }
    }