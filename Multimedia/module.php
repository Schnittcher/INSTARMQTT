<?php

declare(strict_types=1);
require_once __DIR__ . '/../libs/InstarBaseModule.php';

class Multimedia extends InstarBaseModule
{
    const SUBTOPIC = 'multimedia';

    public static $Variables = [
        'AudioOutState'         => ['Audio Out State', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'audio/out/enable'],
        'AudioOutVolume'        => ['Audio Out Volume', VARIABLETYPE_INTEGER, '~Volume', true, true, 'audio/out/volume'],
        'AudioInState'          => ['Audio In State', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'audio/in/enable'],
        'AudioInVolume'         => ['Audio In Volume', VARIABLETYPE_INTEGER, '~Volume', true, true, 'audio/in/volume'],
        'AudioInCodec'          => ['Audio In Codec', VARIABLETYPE_STRING, 'INSTAR.AudioCodec', true, true, 'audio/in/codec'],
        'AudioInSample'         => ['Audio In Sample', VARIABLETYPE_INTEGER, '', false, true, 'audio/in/sample'],
        'AudioOutCodec'         => ['Audio Out Codec', VARIABLETYPE_STRING, 'INSTAR.AudioCodec', true, true, 'audio/out/codec'],
        'AudioOutSample'        => ['Audio Out Sample', VARIABLETYPE_INTEGER, '', false, true, 'audio/out/sample'],
        'VideoHighProfile'      => ['Video High Profile', VARIABLETYPE_STRING, '', false, true, 'video/high/profile'],
        'VideoMidProfile'       => ['Video Mid Profile', VARIABLETYPE_STRING, '', false, true, 'video/mid/profile'],
        'VideoLowProfile'       => ['Video Low Profile', VARIABLETYPE_STRING, '', false, true, 'video/low/profile'],
        'VideoHighBitrate'      => ['Video High Bitrate', VARIABLETYPE_INTEGER, '', false, true, 'video/high/bitrate'],
        'VideoMidBitrate'       => ['Video Mid Bitrate', VARIABLETYPE_INTEGER, '', false, true, 'video/mid/bitrate'],
        'VideoLowBitrate'       => ['Video Low Bitrate', VARIABLETYPE_INTEGER, '', false, true, 'video/low/bitrate'],
        'VideoHighCompression'  => ['Video High Compression', VARIABLETYPE_INTEGER, 'INSTAR.Compression', true, true, 'video/high/compression'],
        'VideoMidCompression'   => ['Video Mid Compression', VARIABLETYPE_INTEGER, 'INSTAR.Compression', true, true, 'video/mid/compression'],
        'VideoLowCompression'   => ['Video Low Compression', VARIABLETYPE_INTEGER, 'INSTAR.Compression', true, true, 'video/low/compression'],
        'VideoHighVBR'          => ['Video High VBR', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'video/high/vbr'],
        'VideoMidVBR'           => ['Video Mid VBR', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'video/mid/vbr'],
        'VideoLowVBR'           => ['Video Low VBR', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'video/low/vbr'],
        'VideoHighFPS'          => ['Video High FPS', VARIABLETYPE_INTEGER, 'INSTAR.FPS', true, true, 'video/high/fps'],
        'VideoMidFPS'           => ['Video Mid FPS', VARIABLETYPE_INTEGER, 'INSTAR.FPS', true, true, 'video/mid/fps'],
        'VideoLowFPS'           => ['Video Low FPS', VARIABLETYPE_INTEGER, 'INSTAR.FPS', true, true, 'video/low/fps'],
        'VideoHighGOP'          => ['Video High GOP', VARIABLETYPE_INTEGER, 'INSTAR.GOP', true, true, 'video/high/gop'],
        'VideoMidGOP'           => ['Video Mid GOP', VARIABLETYPE_INTEGER, 'INSTAR.GOP', true, true, 'video/mid/gop'],
        'VideoLowGOP'           => ['Video Low GOP', VARIABLETYPE_INTEGER, 'INSTAR.GOP', true, true, 'video/low/gop'],
        'VideoHighWidth'        => ['Video High Width', VARIABLETYPE_INTEGER, '', false, true, 'video/high/width'],
        'VideoMidWidth'         => ['Video Mid Width', VARIABLETYPE_INTEGER, '', false, true, 'video/mid/width'],
        'VideoLowWidth'         => ['Video Low Width', VARIABLETYPE_INTEGER, '', false, true, 'video/low/width'],
        'VideoHighHeight'       => ['Video High Hight', VARIABLETYPE_INTEGER, '', false, true, 'video/high/height'],
        'VideoMidHeight'        => ['Video Mid Hight', VARIABLETYPE_INTEGER, '', false, true, 'video/mid/height'],
        'VideoLowHeight'        => ['Video Low Hight', VARIABLETYPE_INTEGER, '', false, true, 'video/low/height'],
        'ImageBrightness'       => ['Image Brightness', VARIABLETYPE_INTEGER, '~Intensity.100', true, true, 'image/brightness'],
        'ImageSaturation'       => ['Image Saturation', VARIABLETYPE_INTEGER, '~Intensity.100', true, true, 'image/saturation'],
        'ImageHUE'              => ['Image HUE', VARIABLETYPE_INTEGER, 'INSTAR.HUE', true, true, 'image/hue'],
        'ImageContrast'         => ['Image Contrast', VARIABLETYPE_INTEGER, '~Intensity.100', true, true, 'image/contrast'],
        'ImageSharpness'        => ['Image Sharpness', VARIABLETYPE_INTEGER, '~Intensity.100', true, true, 'image/sharpness'],
        'ImageDenoiseAuto'      => ['Image Denoise Auto', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'image/denoise/auto'],
        'ImageDenoisePreset'    => ['Image Denoise Preset', VARIABLETYPE_INTEGER, 'INSTAR.Denoise', true, true, 'image/denoise/preset'],
        'ImageTransformFlip'    => ['Image Transform Flip', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'image/transform/flip'],
        'ImageTransformMirror'  => ['Image Transform Mirror', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'image/transform/mirror'],
        'ImageFlickerMode'      => ['Image Flicker Mode', VARIABLETYPE_INTEGER, 'INSTAR.FlickerMode', true, true, 'image/flicker/mode'],
        'ImageFlickerFrequency' => ['Image Flicker Frequency', VARIABLETYPE_INTEGER, 'INSTAR.FlickerFrequency', true, true, 'image/flicker/frequency'],
        'ImageGammaAuto'        => ['Image Gamma Auto', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'image/gamma/auto'],
        'ImageGammaPreset'      => ['Image Gamma Auto', VARIABLETYPE_INTEGER, 'INSTAR.Gamma', true, true, 'image/gamma/preset'],
        'ImageGammaGval'        => ['Image Gamma Gval', VARIABLETYPE_INTEGER, '', false, true, 'image/gamma/gval'],
        'ImageVibrancyAuto'     => ['Image Vibrancy Auto', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'image/vibrancy/auto'],
        'ImageVibrancyValue'    => ['Image Vibrancy Value', VARIABLETYPE_INTEGER, '~Intensity.255', true, true, 'image/vibrancy/value'],
        'ImageBlacklevelAuto'   => ['Image Blacklevel Auto', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'image/blacklevel/auto'],
        'ImageBlacklevelValue'  => ['Image Blacklevel Value', VARIABLETYPE_INTEGER, 'INSTAR.Blacklevel', true, true, 'image/blacklevel/value'],
        'ImageIsomax'           => ['Image Isomax', VARIABLETYPE_INTEGER, 'INSTAR.Isomax', true, true, 'image/isomax'],
        'ImageWDREnable'        => ['Image WDR Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'image/wdr/enable'],
        'ImageWDRStrength'      => ['Image WDR Strength', VARIABLETYPE_INTEGER, 'INSTAR.WDRStrength', true, true, 'image/wdr/strength'],
        'OverlayName'           => ['Overlay Name', VARIABLETYPE_STRING, '', true, true, 'overlay/name'],
        'OverlayNameEnable'     => ['Overlay Name Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'overlay/name/enable'],
        'OverlayTimestamp'      => ['Overlay Timestamp', VARIABLETYPE_STRING, '', true, true, 'overlay/timestamp'],
        'OverlayTimestampEnable'=> ['Overlay Timestamp Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'overlay/timestamp/enable'],
        'PrivacyRegion1Enable'  => ['Privacy Region 1 Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'privacy/region1/enable'],
        'PrivacyRegion1Color'   => ['Privacy Region 1 Color', VARIABLETYPE_INTEGER, '~HexColor', true, true, 'privacy/region1/color'],
        'PrivacyRegion1XOrigin' => ['Privacy Region 1 X Origin', VARIABLETYPE_INTEGER, '', true, true, 'privacy/region1/xorigin'],
        'PrivacyRegion1YOrigin' => ['Privacy Region 1 Y Origin', VARIABLETYPE_INTEGER, '', true, true, 'privacy/region1/yorigin'],
        'PrivacyRegion1Height'  => ['Privacy Region 1 Height', VARIABLETYPE_INTEGER, '', true, true, 'privacy/region1/height'],
        'PrivacyRegion1Width'   => ['Privacy Region 1 Width', VARIABLETYPE_INTEGER, '', true, true, 'privacy/region1/width'],
        'PrivacyRegion2Enable'  => ['Privacy Region 2 Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'privacy/region2/enable'],
        'PrivacyRegion2Color'   => ['Privacy Region 2 Color', VARIABLETYPE_INTEGER, '~HexColor', true, true, 'privacy/region2/color'],
        'PrivacyRegion2XOrigin' => ['Privacy Region 2 X Origin', VARIABLETYPE_INTEGER, '', true, true, 'privacy/region2/xorigin'],
        'PrivacyRegion2YOrigin' => ['Privacy Region 2 Y Origin', VARIABLETYPE_INTEGER, '', true, true, 'privacy/region2/yorigin'],
        'PrivacyRegion2Height'  => ['Privacy Region 2 Height', VARIABLETYPE_INTEGER, '', true, true, 'privacy/region2/height'],
        'PrivacyRegion2Width'   => ['Privacy Region 2 Width', VARIABLETYPE_INTEGER, '', true, true, 'privacy/region2/width'],
        'PrivacyRegion3Enable'  => ['Privacy Region 3 Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'privacy/region3/enable'],
        'PrivacyRegion3Color'   => ['Privacy Region 3 Color', VARIABLETYPE_INTEGER, '~HexColor', true, true, 'privacy/region3/color'],
        'PrivacyRegion3XOrigin' => ['Privacy Region 3 X Origin', VARIABLETYPE_INTEGER, '', true, true, 'privacy/region3/xorigin'],
        'PrivacyRegion3YOrigin' => ['Privacy Region 3 Y Origin', VARIABLETYPE_INTEGER, '', true, true, 'privacy/region3/yorigin'],
        'PrivacyRegion3Height'  => ['Privacy Region 3 Height', VARIABLETYPE_INTEGER, '', true, true, 'privacy/region3/height'],
        'PrivacyRegion3Width'   => ['Privacy Region 3 Width', VARIABLETYPE_INTEGER, '', true, true, 'privacy/region3/width'],
        'PrivacyRegion4Enable'  => ['Privacy Region 4 Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'privacy/region4/enable'],
        'PrivacyRegion4Color'   => ['Privacy Region 4 Color', VARIABLETYPE_INTEGER, '~HexColor', true, true, 'privacy/region4/color'],
        'PrivacyRegion4XOrigin' => ['Privacy Region 4 X Origin', VARIABLETYPE_INTEGER, '', true, true, 'privacy/region4/xorigin'],
        'PrivacyRegion4YOrigin' => ['Privacy Region 4 Y Origin', VARIABLETYPE_INTEGER, '', true, true, 'privacy/region4/yorigin'],
        'PrivacyRegion4Height'  => ['Privacy Region 4 Height', VARIABLETYPE_INTEGER, '', true, true, 'privacy/region4/height'],
        'PrivacyRegion4Width'   => ['Privacy Region 4 Width', VARIABLETYPE_INTEGER, '', true, true, 'privacy/region4/width']
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
        $MQTTTopic = $this->ReadPropertyString('MQTTTopicPraefix') . '/' . $this->ReadPropertyString('MQTTKlientID') . '/status/' . static::SUBTOPIC;
        $this->SetReceiveDataFilter('.*' . $MQTTTopic . '.*');
    }

}