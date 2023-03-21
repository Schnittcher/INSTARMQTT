<?php

declare(strict_types=1);
require_once __DIR__ . '/../libs/InstarBaseModule.php';
    class Multimedia extends InstarBaseModule
    {
        public static $Variables = [
            ['AudioOutState', 'Audio Out State', VARIABLETYPE_BOOLEAN, '~Switch', true, true],
            ['AudioOutVolume', 'Audio Out Volume', VARIABLETYPE_INTEGER, '~Volume', true, true],
            ['AudioInState', 'Audio In State', VARIABLETYPE_BOOLEAN, '~Switch', true, true],
            ['AudioInVolume', 'Audio In Volume', VARIABLETYPE_INTEGER, '~Volume', true, true],
            ['AudioInCodec', 'Audio In Codec', VARIABLETYPE_STRING, 'INSTAR.AudioCodec', true, true],
            ['AudioInSample', 'Audio In Sample', VARIABLETYPE_INTEGER, '', false, true],
            ['AudioOutCodec', 'Audio Out Codec', VARIABLETYPE_STRING, 'INSTAR.AudioCodec', true, true],
            ['AudioOutSample', 'Audio Out Sample', VARIABLETYPE_INTEGER, '', false, true],
            ['VideoHighProfile', 'Video High Profile', VARIABLETYPE_STRING, '', false, true],
            ['VideoMidProfile', 'Video Mid Profile', VARIABLETYPE_STRING, '', false, true],
            ['VideoLowProfile', 'Video Low Profile', VARIABLETYPE_STRING, '', false, true],
            ['VideoHighBitrate', 'Video High Bitrate', VARIABLETYPE_INTEGER, '', false, true],
            ['VideoMidBitrate', 'Video Mid Bitrate', VARIABLETYPE_INTEGER, '', false, true],
            ['VideoLowBitrate', 'Video Low Bitrate', VARIABLETYPE_INTEGER, '', false, true],
            ['VideoHighCompression', 'Video High Compression', VARIABLETYPE_INTEGER, 'INSTAR.Compression', true, true],
            ['VideoMidCompression', 'Video Mid Compression', VARIABLETYPE_INTEGER, 'INSTAR.Compression', true, true],
            ['VideoLowCompression', 'Video Low Compression', VARIABLETYPE_INTEGER, 'INSTAR.Compression', true, true],
            ['VideoHighVBR', 'Video High VBR', VARIABLETYPE_BOOLEAN, '~Switch', true, true],
            ['VideoMidVBR', 'Video Mid VBR', VARIABLETYPE_BOOLEAN, '~Switch', true, true],
            ['VideoLowVBR', 'Video Low VBR', VARIABLETYPE_BOOLEAN, '~Switch', true, true],
            ['VideoHighFPS', 'Video High FPS', VARIABLETYPE_INTEGER, 'INSTAR.FPS', true, true],
            ['VideoMidFPS', 'Video Mid FPS', VARIABLETYPE_INTEGER, 'INSTAR.FPS', true, true],
            ['VideoLowFPS', 'Video Low FPS', VARIABLETYPE_INTEGER, 'INSTAR.FPS', true, true],
            ['VideoHighGOP', 'Video High GOP', VARIABLETYPE_INTEGER, 'INSTAR.GOP', true, true],
            ['VideoMidGOP', 'Video Mid GOP', VARIABLETYPE_INTEGER, 'INSTAR.GOP', true, true],
            ['VideoLowGOP', 'Video Low GOP', VARIABLETYPE_INTEGER, 'INSTAR.GOP', true, true],
            ['VideoHighWidth', 'Video High Width', VARIABLETYPE_INTEGER, '', false, true],
            ['VideoMidWidth', 'Video Mid Width', VARIABLETYPE_INTEGER, '', false, true],
            ['VideoLowWidth', 'Video Low Width', VARIABLETYPE_INTEGER, '', false, true],
            ['VideoHighHeight', 'Video High Hight', VARIABLETYPE_INTEGER, '', false, true],
            ['VideoMidHeight', 'Video Mid Hight', VARIABLETYPE_INTEGER, '', false, true],
            ['VideoLowHeight', 'Video Low Hight', VARIABLETYPE_INTEGER, '', false, true],
            ['ImageBrightness', 'Image Brightness', VARIABLETYPE_INTEGER, '~Intensity.100', true, true],
            ['ImageSaturation', 'Image Saturation', VARIABLETYPE_INTEGER, '~Intensity.100', true, true],
            ['ImageHUE', 'Image HUE', VARIABLETYPE_INTEGER, 'INSTAR.HUE', true, true],
            ['ImageContrast', 'Image Contrast', VARIABLETYPE_INTEGER, '~Intensity.100', true, true],
            ['ImageSharpness', 'Image Sharpness', VARIABLETYPE_INTEGER, '~Intensity.100', true, true],
            ['ImageDenoiseAuto', 'Image Denoise Auto', VARIABLETYPE_BOOLEAN, '~Switch', true, true],
            ['ImageDenoisePreset', 'Image Denoise Preset', VARIABLETYPE_INTEGER, 'INSTAR.Denoise', true, true],
            ['ImageTransformFlip', 'Image Transform Flip', VARIABLETYPE_BOOLEAN, '~Switch', true, true],
            ['ImageTransformMirror', 'Image Transform Mirror', VARIABLETYPE_BOOLEAN, '~Switch', true, true],
            ['ImageFlickerMode', 'Image Flicker Mode', VARIABLETYPE_INTEGER, 'INSTAR.FlickerMode', true, true],
            ['ImageFlickerFrequency', 'Image Flicker Frequency', VARIABLETYPE_INTEGER, 'INSTAR.FlickerFrequency', true, true],
            ['ImageGammaAuto', 'Image Gamma Auto', VARIABLETYPE_BOOLEAN, '~Switch', true, true],
            ['ImageGammaPreset', 'Image Gamma Auto', VARIABLETYPE_INTEGER, 'INSTAR.Gamma', true, true],
            ['ImageGammaGval', 'Image Gamma Gval', VARIABLETYPE_INTEGER, '', false, true],
            ['ImageVibrancyAuto', 'Image Vibrancy Auto', VARIABLETYPE_BOOLEAN, '~Switch', true, true],
            ['ImageVibrancyValue', 'Image Vibrancy Value', VARIABLETYPE_INTEGER, '~Intensity.255', true, true],
            ['ImageBlacklevelAuto', 'Image Blacklevel Auto', VARIABLETYPE_BOOLEAN, '~Switch', true, true],
            ['ImageBlacklevelValue', 'Image Blacklevel Value', VARIABLETYPE_INTEGER, 'INSTAR.Blacklevel', true, true],
            ['ImageIsomax', 'Image Isomax', VARIABLETYPE_INTEGER, 'INSTAR.Isomax', true, true],
            ['ImageWDREnable', 'Image WDR Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true],
            ['ImageWDRStrength', 'Image WDR Strength', VARIABLETYPE_INTEGER, 'INSTAR.WDRStrength', true, true],
            ['OverlayName', 'Overlay Name', VARIABLETYPE_STRING, '', true, true],
            ['OverlayNameEnable', 'Overlay Name Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true],
            ['OverlayTimestamp', 'Overlay Timestamp', VARIABLETYPE_STRING, '', true, true],
            ['OverlayTimestampEnable', 'Overlay Timestamp Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true],
            ['PrivacyRegion1Enable', 'Privacy Region 1 Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true],
            ['PrivacyRegion1Color', 'Privacy Region 1 Color', VARIABLETYPE_INTEGER, '~HexColor', true, true],
            ['PrivacyRegion1XOrigin', 'Privacy Region 1 X Origin', VARIABLETYPE_INTEGER, '', true, true],
            ['PrivacyRegion1YOrigin', 'Privacy Region 1 Y Origin', VARIABLETYPE_INTEGER, '', true, true],
            ['PrivacyRegion1Height', 'Privacy Region 1 Height', VARIABLETYPE_INTEGER, '', true, true],
            ['PrivacyRegion1Width', 'Privacy Region 1 Width', VARIABLETYPE_INTEGER, '', true, true],
            ['PrivacyRegion2Enable', 'Privacy Region 2 Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true],
            ['PrivacyRegion2Color', 'Privacy Region 2 Color', VARIABLETYPE_INTEGER, '~HexColor', true, true],
            ['PrivacyRegion2XOrigin', 'Privacy Region 2 X Origin', VARIABLETYPE_INTEGER, '', true, true],
            ['PrivacyRegion2YOrigin', 'Privacy Region 2 Y Origin', VARIABLETYPE_INTEGER, '', true, true],
            ['PrivacyRegion2Height', 'Privacy Region 2 Height', VARIABLETYPE_INTEGER, '', true, true],
            ['PrivacyRegion2Width', 'Privacy Region 2 Width', VARIABLETYPE_INTEGER, '', true, true],
            ['PrivacyRegion3Enable', 'Privacy Region 3 Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true],
            ['PrivacyRegion3Color', 'Privacy Region 3 Color', VARIABLETYPE_INTEGER, '~HexColor', true, true],
            ['PrivacyRegion3XOrigin', 'Privacy Region 3 X Origin', VARIABLETYPE_INTEGER, '', true, true],
            ['PrivacyRegion3YOrigin', 'Privacy Region 3 Y Origin', VARIABLETYPE_INTEGER, '', true, true],
            ['PrivacyRegion3Height', 'Privacy Region 3 Height', VARIABLETYPE_INTEGER, '', true, true],
            ['PrivacyRegion3Width', 'Privacy Region 3 Width', VARIABLETYPE_INTEGER, '', true, true],
            ['PrivacyRegion4Enable', 'Privacy Region 4 Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true],
            ['PrivacyRegion4Color', 'Privacy Region 4 Color', VARIABLETYPE_INTEGER, '~HexColor', true, true],
            ['PrivacyRegion4XOrigin', 'Privacy Region 4 X Origin', VARIABLETYPE_INTEGER, '', true, true],
            ['PrivacyRegion4YOrigin', 'Privacy Region 4 Y Origin', VARIABLETYPE_INTEGER, '', true, true],
            ['PrivacyRegion4Height', 'Privacy Region 4 Height', VARIABLETYPE_INTEGER, '', true, true],
            ['PrivacyRegion4Width', 'Privacy Region 4 Width', VARIABLETYPE_INTEGER, '', true, true]
        ];

        public function Create()
        {
            if (!IPS_VariableProfileExists('INSTAR.AudioCodec')) {
                $this->RegisterProfileStringEx('INSTAR.AudioCodec', 'Information', '', '', [
                    ['alaw', $this->Translate('alaw'), '', 0x00FF00],
                    ['ulaw', $this->Translate('ulaw'), '', 0x00FF00],
                    ['pcm', $this->Translate('pcm'), '', 0x00FF00],
                    ['aac', $this->Translate('aac'), '', 0x00FF00]
                ]);
            }
            if (!IPS_VariableProfileExists('INSTAR.Compression')) {
                $this->RegisterProfileInteger('INSTAR.Compression', 'Information', '', '', 1, 10, 1);
            }
            if (!IPS_VariableProfileExists('INSTAR.FPS')) {
                $this->RegisterProfileInteger('INSTAR.FPS', 'Information', '', '', 1, 30, 1);
            }
            if (!IPS_VariableProfileExists('INSTAR.GOP')) {
                $this->RegisterProfileInteger('INSTAR.GOP', 'Information', '', '', 1, 120, 1);
            }
            if (!IPS_VariableProfileExists('INSTAR.HUE')) {
                $this->RegisterProfileInteger('INSTAR.HUE', 'Information', '', '', 0, 360, 1);
            }
            if (!IPS_VariableProfileExists('INSTAR.Denoise')) {
                $this->RegisterProfileInteger('INSTAR.Denoise', 'Information', '', '', 1, 16, 1);
            }
            if (!IPS_VariableProfileExists('INSTAR.FlickerMode')) {
                $this->RegisterProfileInteger('INSTAR.FlickerMode', 'Information', '', '', 0, 2, 1);
            }
            if (!IPS_VariableProfileExists('INSTAR.FlickerFrequency')) {
                $this->RegisterProfileStringEx('INSTAR.FlickerFrequency', 'Information', '', '', [
                    [50, '50', '', 0x00FF00],
                    [55, '55', '', 0x00FF00],
                    [60, '60', '', 0x00FF00],
                ]);
            }
            if (!IPS_VariableProfileExists('INSTAR.Gamma')) {
                $this->RegisterProfileInteger('INSTAR.Gamma', 'Information', '', '', 1, 18, 1);
            }
            if (!IPS_VariableProfileExists('INSTAR.Blacklevel')) {
                $this->RegisterProfileInteger('INSTAR.Blacklevel', 'Information', '', '', 1, 25, 1);
            }
            if (!IPS_VariableProfileExists('INSTAR.Isomax')) {
                $this->RegisterProfileInteger('INSTAR.Isomax', 'Information', '', '', 1, 32, 1);
            }
            if (!IPS_VariableProfileExists('INSTAR.WDRStrength')) {
                $this->RegisterProfileInteger('INSTAR.WDRStrength', 'Information', '', '', 1, 7, 1);
            }

            //Never delete this line!
            parent::Create();
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

            //Setze Filter für ReceiveData
            $MQTTTopic = $this->ReadPropertyString('MQTTTopicPraefix') . '/' . $this->ReadPropertyString('MQTTKlientID');
            $this->SetReceiveDataFilter('.*' . $MQTTTopic . '.*');
        }

        public function RequestAction($Ident, $Value)
        {
            $Payload = [];
            $Payload['val'] = '';
            $Topic = $this->ReadPropertyString('MQTTTopicPraefix') . '/' . $this->ReadPropertyString('MQTTKlientID') . '/multimedia';
            switch ($Ident) {
                case 'AudioOutState':
                    $Topic = $Topic . '/audio/out/enable';
                    $Payload['val'] = strval(intval($Value));
                    break;
                case 'AudioInState':
                    $Topic = $Topic . '/audio/in/enable';
                    $Payload['val'] = strval(intval($Value));
                    break;
                case 'AudioOutVolume':
                    $Topic = $Topic . '/audio/out/volume';
                    $Payload['val'] = strval($Value);
                    break;
                case 'AudioInVolume':
                    $Topic = $Topic . '/audio/in/volume';
                    $Payload['val'] = strval($Value);
                    break;
                case 'AudioInCodec':
                    $Topic = $Topic . '/audio/in/codec';
                    $Payload['val'] = strval($Value);
                    break;
                case 'AudioOutCodec':
                    $Topic = $Topic . '/audio/out/codec';
                    $Payload['val'] = strval($Value);
                    break;
                case 'VideoHighCompression':
                    $Topic = $Topic . '/video/high/compression';
                    $Payload['val'] = strval($Value);
                    break;
                case 'VideoHighCompression':
                    $Topic = $Topic . '/video/high/compression';
                    $Payload['val'] = strval($Value);
                    break;
                case 'VideoLowCompression':
                    $Topic = $Topic . '/video/low/compression';
                    $Payload['val'] = strval($Value);
                    break;
                case 'VideoHighVBR':
                    $Topic = $Topic . '/video/high/vbr';
                    $Payload['val'] = strval(intval($Value));
                    break;
                case 'VideoMidVBR':
                    $Topic = $Topic . '/video/mid/vbr';
                    $Payload['val'] = strval(intval($Value));
                    break;
                case 'VideoLowVBR':
                    $Topic = $Topic . '/video/low/vbr';
                    $Payload['val'] = strval(intval($Value));
                    break;
                case 'VideoHighFPS':
                    $Topic = $Topic . '/video/high/fps';
                    $Payload['val'] = strval($Value);
                    break;
                case 'VideoMidFPS':
                    $Topic = $Topic . '/video/mid/fps';
                    $Payload['val'] = strval($Value);
                    break;
                case 'VideoLowFPS':
                    $Topic = $Topic . '/video/low/fps';
                    $Payload['val'] = strval($Value);
                    break;
                case 'VideoHighGOP':
                    $Topic = $Topic . '/video/high/gop';
                    $Payload['val'] = strval($Value);
                    break;
                case 'VideoMidGOP':
                    $Topic = $Topic . '/video/mid/gop';
                    $Payload['val'] = strval($Value);
                    break;
                case 'VideoLowGOP':
                    $Topic = $Topic . '/video/low/gop';
                    $Payload['val'] = strval($Value);
                    break;
                case 'ImageBrightness':
                    $Topic = $Topic . '/image/brightness';
                    $Payload['val'] = strval($Value);
                    break;
                case 'ImageSaturation':
                    $Topic = $Topic . '/image/saturation';
                    $Payload['val'] = strval($Value);
                    break;
                case 'ImageHUE':
                    $Topic = $Topic . '/image/hue';
                    $Payload['val'] = strval($Value);
                    break;
                case 'ImageContrast':
                    $Topic = $Topic . '/image/contrast';
                    $Payload['val'] = strval($Value);
                    break;
                case 'ImageSharpness':
                    $Topic = $Topic . '/image/sharpness';
                    $Payload['val'] = strval($Value);
                    break;
                case 'ImageDenoiseAuto':
                    $Topic = $Topic . '/image/denoise/auto';
                    $Payload['val'] = strval(intval($Value));
                    break;
                case 'ImageDenoisePreset':
                    $Topic = $Topic . '/image/denoise/preset';
                    $Payload['val'] = strval($Value);
                    break;
                case 'ImageTransformFlip':
                    $Topic = $Topic . '/image/transform/flip';
                    $Payload['val'] = strval(intval($Value));
                    break;
                case 'ImageTransformMirror':
                    $Topic = $Topic . '/image/transform/mirror';
                    $Payload['val'] = strval(intval($Value));
                    break;
                case 'ImageFlickerMode':
                    $Topic = $Topic . '/image/flicker/mode';
                    $Payload['val'] = strval($Value);
                    break;
                case 'ImageFlickerFrequency':
                    $Topic = $Topic . '/image/flicker/frequency';
                    $Payload['val'] = strval($Value);
                    break;
                case 'ImageGammaAuto':
                    $Topic = $Topic . '/image/gamma/auto';
                    $Payload['val'] = strval(intval($Value));
                    break;
                case 'ImageGammaPreset':
                    $Topic = $Topic . '/image/gamma/preset';
                    $Payload['val'] = strval($Value);
                    break;
                case 'ImageGammaGval':
                    $Topic = $Topic . '/image/gamma/gval';
                    $Payload['val'] = strval($Value);
                    break;
                case 'ImageVibrancyAuto':
                    $Topic = $Topic . '/image/vibrancy/auto';
                    $Payload['val'] = strval(intval($Value));
                    break;
                case 'ImageVibrancyValue':
                    $Topic = $Topic . '/image/vibrancy/value';
                    $Payload['val'] = strval($Value);
                    break;
                case 'ImageBlacklevelAuto':
                    $Topic = $Topic . '/image/blacklevel/auto';
                    $Payload['val'] = strval(intval($Value));
                    break;
                case 'ImageBlacklevelValue':
                    $Topic = $Topic . '/image/blacklevel/value';
                    $Payload['val'] = strval($Value);
                    break;
                case 'ImageIsomax':
                    $Topic = $Topic . '/image/isomax';
                    $Payload['val'] = strval($Value);
                    break;
                case 'ImageWDREnable':
                    $Topic = $Topic . '/image/wdr/enable';
                    $Payload['val'] = strval(intval($Value));
                    break;
                case 'ImageWDRStrength':
                    $Topic = $Topic . '/image/wdr/strength';
                    $Payload['val'] = strval($Value);
                    break;
                case 'OverlayName':
                    $Topic = $Topic . '/overlay/name';
                    $Payload['val'] = strval($Value);
                    break;
                case 'OverlayNameEnable':
                    $Topic = $Topic . '/overlay/name/enable';
                    $Payload['val'] = strval(intval($Value));
                    break;
                case 'OverlayTimestamp':
                    $Topic = $Topic . '/overlay/timestamp';
                    $Payload['val'] = strval($Value);
                    break;
                case 'OverlayTimestampEnable':
                    $Topic = $Topic . '/overlay/timestamp/enable';
                    $Payload['val'] = strval(intval($Value));
                    break;
                case 'PrivacyRegion1Enable':
                    $Topic = $Topic . '/privacy/region1/enable';
                    $Payload['val'] = strval(intval($Value));
                    break;
                case 'PrivacyRegion1Color':
                    $Topic = $Topic . '/privacy/region1/color';
                    $color = strval(dechex($Value));
                    if ($color == '0') {
                        $color = str_pad($color, 6, '0');
                    }
                    $Payload['val'] = $color;
                    break;
                case 'PrivacyRegion1XOrigin':
                    $Topic = $Topic . '/privacy/region1/xorigin';
                    $Payload['val'] = strval($Value);
                    break;
                case 'PrivacyRegion1YOrigin':
                    $Topic = $Topic . '/privacy/region1/yorigin';
                    $Payload['val'] = strval($Value);
                    break;
                case 'PrivacyRegion1Height':
                    $Topic = $Topic . '/privacy/region1/height';
                    $Payload['val'] = strval($Value);
                    break;
                case 'PrivacyRegion1Width':
                    $Topic = $Topic . '/privacy/region1/width';
                    $Payload['val'] = strval($Value);
                    break;
                case 'PrivacyRegion2Enable':
                    $Topic = $Topic . '/privacy/region2/enable';
                    $Payload['val'] = strval(intval($Value));
                    break;
                case 'PrivacyRegion2Color':
                    $Topic = $Topic . '/privacy/region2/color';
                    $color = strval(dechex($Value));
                    if ($color == '0') {
                        $color = str_pad($color, 6, '0');
                    }
                    $Payload['val'] = $color;
                    break;
                case 'PrivacyRegion2XOrigin':
                    $Topic = $Topic . '/privacy/region2/xorigin';
                    $Payload['val'] = strval($Value);
                    break;
                case 'PrivacyRegion2YOrigin':
                    $Topic = $Topic . '/privacy/region2/yorigin';
                    $Payload['val'] = strval($Value);
                    break;
                case 'PrivacyRegion2Height':
                    $Topic = $Topic . '/privacy/region2/height';
                    $Payload['val'] = strval($Value);
                    break;
                case 'PrivacyRegion2Width':
                    $Topic = $Topic . '/privacy/region2/width';
                    $Payload['val'] = strval($Value);
                    break;
                case 'PrivacyRegion3Enable':
                    $Topic = $Topic . '/privacy/region3/enable';
                    $Payload['val'] = strval(intval($Value));
                    break;
                case 'PrivacyRegion3Color':
                    $Topic = $Topic . '/privacy/region3/color';
                    $color = strval(dechex($Value));
                    if ($color == '0') {
                        $color = str_pad($color, 6, '0');
                    }
                    $Payload['val'] = $color;
                    break;
                case 'PrivacyRegion3XOrigin':
                    $Topic = $Topic . '/privacy/region3/xorigin';
                    $Payload['val'] = strval($Value);
                    break;
                case 'PrivacyRegion3YOrigin':
                    $Topic = $Topic . '/privacy/region3/yorigin';
                    $Payload['val'] = strval($Value);
                    break;
                case 'PrivacyRegion3Height':
                    $Topic = $Topic . '/privacy/region3/height';
                    $Payload['val'] = strval($Value);
                    break;
                case 'PrivacyRegion3Width':
                    $Topic = $Topic . '/privacy/region3/width';
                    $Payload['val'] = strval($Value);
                    break;
                case 'PrivacyRegion4Enable':
                    $Topic = $Topic . '/privacy/region4/enable';
                    $Payload['val'] = strval(intval($Value));
                    break;
                case 'PrivacyRegion4Color':
                    $Topic = $Topic . '/privacy/region4/color';
                    $color = strval(dechex($Value));
                    if ($color == '0') {
                        $color = str_pad($color, 6, '0');
                    }
                    $Payload['val'] = $color;
                    break;
                case 'PrivacyRegion4XOrigin':
                    $Topic = $Topic . '/privacy/region4/xorigin';
                    $Payload['val'] = strval($Value);
                    break;
                case 'PrivacyRegion4YOrigin':
                    $Topic = $Topic . '/privacy/region4/yorigin';
                    $Payload['val'] = strval($Value);
                    break;
                case 'PrivacyRegion4Height':
                    $Topic = $Topic . '/privacy/region4/height';
                    $Payload['val'] = strval($Value);
                    break;
                case 'PrivacyRegion4Width':
                    $Topic = $Topic . '/privacy/region4/width';
                    $Payload['val'] = strval($Value);
                    break;
                default:
                    $this->LogMessage($this->Translate('Action missing'), KL_ERROR);
                    return;
            }
            $this->SendMQTT($Topic, json_encode($Payload));
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
                    if (fnmatch('*/status/multimedia/audio/out/enable', $Buffer['Topic'])) {
                        $this->SetValue('AudioOutState', boolval($Payload['val']));
                    }
                    if (fnmatch('*/status/multimedia/audio/out/volume', $Buffer['Topic'])) {
                        $this->SetValue('AudioOutVolume', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/audio/in/enable', $Buffer['Topic'])) {
                        $this->SetValue('AudioInState', boolval($Payload['val']));
                    }
                    if (fnmatch('*/status/multimedia/audio/in/volume', $Buffer['Topic'])) {
                        $this->SetValue('AudioInVolume', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/audio/in/volume', $Buffer['Topic'])) {
                        $this->SetValue('AudioInVolume', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/audio/in/codec', $Buffer['Topic'])) {
                        $this->SetValue('AudioInCodec', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/audio/in/sample', $Buffer['Topic'])) {
                        $this->SetValue('AudioInSample', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/audio/out/codec', $Buffer['Topic'])) {
                        $this->SetValue('AudioOutCodec', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/audio/out/sample', $Buffer['Topic'])) {
                        $this->SetValue('AudioOutSample', $Payload['val']);
                    }
                    ### Video
                    if (fnmatch('*/status/multimedia/video/high/profile', $Buffer['Topic'])) {
                        $this->SetValue('VideoHighProfile', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/video/mid/profile', $Buffer['Topic'])) {
                        $this->SetValue('VideoMidProfile', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/video/low/profile', $Buffer['Topic'])) {
                        $this->SetValue('VideoLowProfile', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/video/high/bitrate', $Buffer['Topic'])) {
                        $this->SetValue('VideoHighBitrate', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/video/mid/bitrate', $Buffer['Topic'])) {
                        $this->SetValue('VideoMidBitrate', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/video/low/bitrate', $Buffer['Topic'])) {
                        $this->SetValue('VideoLowBitrate', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/video/high/compression', $Buffer['Topic'])) {
                        $this->SetValue('VideoHighCompression', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/video/mid/compression', $Buffer['Topic'])) {
                        $this->SetValue('VideoMidCompression', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/video/low/compression', $Buffer['Topic'])) {
                        $this->SetValue('VideoLowCompression', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/video/high/vbr', $Buffer['Topic'])) {
                        $this->SetValue('VideoHighVBR', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/video/mid/vbr', $Buffer['Topic'])) {
                        $this->SetValue('VideoMidVBR', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/video/low/vbr', $Buffer['Topic'])) {
                        $this->SetValue('VideoLowVBR', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/video/high/fps', $Buffer['Topic'])) {
                        $this->SetValue('VideoHighFPS', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/video/mid/fps', $Buffer['Topic'])) {
                        $this->SetValue('VideoMidFPS', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/video/low/fps', $Buffer['Topic'])) {
                        $this->SetValue('VideoLowFPS', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/video/high/gop', $Buffer['Topic'])) {
                        $this->SetValue('VideoHighGOP', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/video/mid/gop', $Buffer['Topic'])) {
                        $this->SetValue('VideoMidGOP', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/video/low/gop', $Buffer['Topic'])) {
                        $this->SetValue('VideoLowGOP', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/video/high/width', $Buffer['Topic'])) {
                        $this->SetValue('VideoHighWidth', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/video/mid/width', $Buffer['Topic'])) {
                        $this->SetValue('VideoMidWidth', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/video/low/width', $Buffer['Topic'])) {
                        $this->SetValue('VideoLowWidth', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/video/high/height', $Buffer['Topic'])) {
                        $this->SetValue('VideoHighHeight', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/video/mid/height', $Buffer['Topic'])) {
                        $this->SetValue('VideoMidHeight', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/video/low/height', $Buffer['Topic'])) {
                        $this->SetValue('VideoLowHeight', $Payload['val']);
                    }
                    ###Brightness
                    if (fnmatch('*/status/multimedia/image/brightness', $Buffer['Topic'])) {
                        $this->SetValue('ImageBrightness', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/image/saturation', $Buffer['Topic'])) {
                        $this->SetValue('ImageSaturation', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/image/hue', $Buffer['Topic'])) {
                        $this->SetValue('ImageHUE', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/image/contrast', $Buffer['Topic'])) {
                        $this->SetValue('ImageContrast', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/image/sharpness', $Buffer['Topic'])) {
                        $this->SetValue('ImageSharpness', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/image/denoise/auto', $Buffer['Topic'])) {
                        $this->SetValue('ImageDenoiseAuto', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/image/denoise/preset', $Buffer['Topic'])) {
                        $this->SetValue('ImageDenoisePreset', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/image/transform/flip', $Buffer['Topic'])) {
                        $this->SetValue('ImageTransformFlip', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/image/transform/mirror', $Buffer['Topic'])) {
                        $this->SetValue('ImageTransformMirror', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/image/flicker/mode', $Buffer['Topic'])) {
                        $this->SetValue('ImageFlickerMode', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/image/flicker/frequency', $Buffer['Topic'])) {
                        $this->SetValue('ImageFlickerFrequency', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/image/gamma/auto', $Buffer['Topic'])) {
                        $this->SetValue('ImageGammaAuto', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/image/gamma/preset', $Buffer['Topic'])) {
                        $this->SetValue('ImageGammaPreset', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/image/gamma/gval', $Buffer['Topic'])) {
                        $this->SetValue('ImageGammaGval', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/image/vibrancy/auto', $Buffer['Topic'])) {
                        $this->SetValue('ImageVibrancyAuto', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/image/vibrancy/value', $Buffer['Topic'])) {
                        $this->SetValue('ImageVibrancyValue', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/image/blacklevel/auto', $Buffer['Topic'])) {
                        $this->SetValue('ImageBlacklevelAuto', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/image/blacklevel/value', $Buffer['Topic'])) {
                        $this->SetValue('ImageBlacklevelValue', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/image/isomax', $Buffer['Topic'])) {
                        $this->SetValue('ImageIsomax', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/image/wdr/enable', $Buffer['Topic'])) {
                        $this->SetValue('ImageWDREnable', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/image/wdr/strength', $Buffer['Topic'])) {
                        $this->SetValue('ImageWDRStrength', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/overlay/name', $Buffer['Topic'])) {
                        $this->SetValue('OverlayName', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/overlay/name/enable', $Buffer['Topic'])) {
                        $this->SetValue('OverlayNameEnable', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/overlay/timestamp', $Buffer['Topic'])) {
                        $this->SetValue('OverlayTimestamp', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/overlay/timestamp/enable', $Buffer['Topic'])) {
                        $this->SetValue('OverlayTimestampEnable', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/privacy/region1/enable', $Buffer['Topic'])) {
                        $this->SetValue('PrivacyRegion1Enable', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/privacy/region1/color', $Buffer['Topic'])) {
                        $this->SetValue('PrivacyRegion1Color', hexdec($Payload['val']));
                    }
                    if (fnmatch('*/status/multimedia/privacy/region1/xorigin', $Buffer['Topic'])) {
                        $this->SetValue('PrivacyRegion1XOrigin', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/privacy/region1/yorigin', $Buffer['Topic'])) {
                        $this->SetValue('PrivacyRegion1YOrigin', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/privacy/region1/height', $Buffer['Topic'])) {
                        $this->SetValue('PrivacyRegion1Height', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/privacy/region1/width', $Buffer['Topic'])) {
                        $this->SetValue('PrivacyRegion1Width', $Payload['val']);
                    }

                    if (fnmatch('*/status/multimedia/privacy/region2/enable', $Buffer['Topic'])) {
                        $this->SetValue('PrivacyRegion2Enable', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/privacy/region2/color', $Buffer['Topic'])) {
                        $this->SetValue('PrivacyRegion2Color', hexdec($Payload['val']));
                    }
                    if (fnmatch('*/status/multimedia/privacy/region2/xorigin', $Buffer['Topic'])) {
                        $this->SetValue('PrivacyRegion2XOrigin', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/privacy/region2/yorigin', $Buffer['Topic'])) {
                        $this->SetValue('PrivacyRegion2YOrigin', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/privacy/region2/height', $Buffer['Topic'])) {
                        $this->SetValue('PrivacyRegion2Height', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/privacy/region2/width', $Buffer['Topic'])) {
                        $this->SetValue('PrivacyRegion2Width', $Payload['val']);
                    }

                    if (fnmatch('*/status/multimedia/privacy/region3/enable', $Buffer['Topic'])) {
                        $this->SetValue('PrivacyRegion3Enable', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/privacy/region3/color', $Buffer['Topic'])) {
                        $this->SetValue('PrivacyRegion3Color', hexdec($Payload['val']));
                    }
                    if (fnmatch('*/status/multimedia/privacy/region3/xorigin', $Buffer['Topic'])) {
                        $this->SetValue('PrivacyRegion3XOrigin', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/privacy/region3/yorigin', $Buffer['Topic'])) {
                        $this->SetValue('PrivacyRegion3YOrigin', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/privacy/region3/height', $Buffer['Topic'])) {
                        $this->SetValue('PrivacyRegion3Height', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/privacy/region3/width', $Buffer['Topic'])) {
                        $this->SetValue('PrivacyRegion3Width', $Payload['val']);
                    }

                    if (fnmatch('*/status/multimedia/privacy/region4/enable', $Buffer['Topic'])) {
                        $this->SetValue('PrivacyRegion4Enable', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/privacy/region4/color', $Buffer['Topic'])) {
                        $this->SetValue('PrivacyRegion4Color', hexdec($Payload['val']));
                    }
                    if (fnmatch('*/status/multimedia/privacy/region4/xorigin', $Buffer['Topic'])) {
                        $this->SetValue('PrivacyRegion4XOrigin', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/privacy/region4/yorigin', $Buffer['Topic'])) {
                        $this->SetValue('PrivacyRegion4YOrigin', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/privacy/region4/height', $Buffer['Topic'])) {
                        $this->SetValue('PrivacyRegion4Height', $Payload['val']);
                    }
                    if (fnmatch('*/status/multimedia/privacy/region4/width', $Buffer['Topic'])) {
                        $this->SetValue('PrivacyRegion4Width', $Payload['val']);
                    }
                }
            }
        }
    }