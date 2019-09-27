<?php

namespace Modules\Car\Database\Seeders;

use App\Content;
use App\ContentMeta;
use App\Group;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class CarContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $time = time();
        $rootPath = config('content.cars.rootPath');

<<<<<<< HEAD
        factory(Content::class, 100)->create(['type' => Content::TYPE_CAR])->each(function ($content) use ($time, $rootPath) {
=======
        factory(Content::class, 50)->create(['type' => Content::TYPE_CAR])->each(function ($content) use($time, $rootPath) {

            $content->slug = config('content.cars.containerPage') . '/' . $content->slug;
            $content->save();
>>>>>>> 68fd797cc13c9cddf1b4e09c548132c2ee9d6bf8

            $carUserRandomId = User::whereHas('groups', function ($query) {
                $query->where('type', Group::TYPE_DYNAMIC);
            })->get()->random()->id;
            $content->author_id = $carUserRandomId;
            $content->save();

            // -------------
            $thumbWidth = 640;
            $thumbHeight = 360;
            $mediaWidth = 1920;
            $mediaHeight = 1080;
            $lorempixelType = 'transport';
            $lorempixelUrl = 'http://lorempixel.com';
            $thumbnail = $lorempixelUrl . '/' . $thumbWidth . '/' . $thumbHeight . '/' . $lorempixelType . '/?=' . rand(1, 50000);
            $medias = [];
            $mediasLimit = rand(1, 20);
            for ($i = 0; $i < $mediasLimit; $i++) {
                $media = $lorempixelUrl . '/' . $mediaWidth . '/' . $mediaHeight . '/' . $lorempixelType . '/?=' . rand(1, 50000);
                $meta = new ContentMeta(['key' => 'medias', 'value' => $media]);
                array_push($medias, $meta);
            }

            // Publish Types
            $publishTypes = ['free', 'premium', 'best_premium'];

            $content->metas()->saveMany([
                new ContentMeta(['key' => 'plateNumber', 'value' => '0035UNA']),
                new ContentMeta(['key' => 'cabinNumber', 'value' => 'VF3 3CRFNC 12345678']),
                new ContentMeta(['key' => 'countryName', 'value' => 'Korea']),
                new ContentMeta(['key' => 'markName', 'value' => 'Toyota']),
                new ContentMeta(['key' => 'modelName', 'value' => 'Prius']),
                new ContentMeta(['key' => 'type', 'value' => 'Sedan']),
                new ContentMeta(['key' => 'className', 'value' => 'luxury']),
                new ContentMeta(['key' => 'manCount', 'value' => '4']),
                new ContentMeta(['key' => 'weightAmount', 'value' => '1200']),
                new ContentMeta(['key' => 'weightUnit', 'value' => 'kg']),
                new ContentMeta(['key' => 'massAmount', 'value' => '1200']),
                new ContentMeta(['key' => 'massUnit', 'value' => 'kg']),
                new ContentMeta(['key' => 'fuelType', 'value' => 'gas']),
                new ContentMeta(['key' => 'widthAmount', 'value' => '160']),
                new ContentMeta(['key' => 'widthUnit', 'value' => 'cm']),
                new ContentMeta(['key' => 'heightAmount', 'value' => '120']),
                new ContentMeta(['key' => 'heightUnit', 'value' => 'cm']),
                new ContentMeta(['key' => 'capacityAmount', 'value' => '1500']),
                new ContentMeta(['key' => 'capacityUnit', 'value' => 'cc']),
                new ContentMeta(['key' => 'motorNumber', 'value' => '2H2tXA598WDY987665']),
                new ContentMeta(['key' => 'colorName', 'value' => 'black']),
                new ContentMeta(['key' => 'axleCount', 'value' => '2']),
                new ContentMeta(['key' => 'certificateNumber', 'value' => '2H2tXA598WDY987665']),
                new ContentMeta(['key' => 'importDate', 'value' => '2006']),
                new ContentMeta(['key' => 'intent', 'value' => 'use']),
                new ContentMeta(['key' => 'transmission', 'value' => 'automatic']),
                new ContentMeta(['key' => 'archiveDate', 'value' => '2008']),
                new ContentMeta(['key' => 'buildYear', 'value' => '2003']),
                new ContentMeta(['key' => 'archiveFirstNumber', 'value' => 'A598WDY987']),
                new ContentMeta(['key' => 'wheelPosition', 'value' => 'left']),
                new ContentMeta(['key' => 'lengthAmount', 'value' => '4']),
                new ContentMeta(['key' => 'lengthUnit', 'value' => 'm']),
                new ContentMeta(['key' => 'archiveNumber', 'value' => 'A598WDY987']),
                new ContentMeta(['key' => 'carCondition', 'value' => 'used']),
                new ContentMeta(['key' => 'wheelDrive', 'value' => 'back']),
                new ContentMeta(['key' => 'mileage', 'value' => '5000km']),
                new ContentMeta(['key' => 'advantages', 'value' => 'used in womans hand']),
                new ContentMeta(['key' => 'priceAmount', 'value' => '10000000']),
                new ContentMeta(['key' => 'priceUnit', 'value' => 'tugrug']),
                new ContentMeta(['key' => 'priceType', 'value' => 'loan']),
                new ContentMeta(['key' => 'thumbnail', 'value' => $thumbnail]),
                new ContentMeta(['key' => 'link', 'value' => 'https://www.youtube.com/watch?v=2RnGwkWL94I']),
                new ContentMeta(['key' => 'buyoutAmount', 'value' => '10000000']),
                new ContentMeta(['key' => 'buyoutUnit', 'value' => 'tugrug']),
                new ContentMeta(['key' => 'startPriceAmount', 'value' => '8000000']),
                new ContentMeta(['key' => 'startPriceUnit', 'value' => 'tugrug']),
                new ContentMeta(['key' => 'maxBidAmount', 'value' => '14000000']),
                new ContentMeta(['key' => 'maxBidUnit', 'value' => 'tugrug']),
                new ContentMeta(['key' => 'startsAt', 'value' => '2019-09-15']),
                new ContentMeta(['key' => 'endsAt', 'value' => '2019-09-18']),

                new ContentMeta(['key' => 'viewed', 'value' => '419']),
                new ContentMeta(['key' => 'interested', 'value' => '51']),

                new ContentMeta(['key' => 'engine', 'value' => '1499 L']),
                new ContentMeta(['key' => 'chassis', 'value' => '4 WD']),
                new ContentMeta(['key' => 'speedLimitAmount', 'value' => '180']),
                new ContentMeta(['key' => 'speedLimitUnit', 'value' => 'km/h']),
                new ContentMeta(['key' => 'colorNameInterior', 'value' => 'beige']),
                new ContentMeta(['key' => 'colorNameExterior', 'value' => 'black']),
                new ContentMeta(['key' => 'doorCount', 'value' => '4']),

                // Doctor Service Verification
                new ContentMeta(['key' => 'doctorVerified', 'value' => true]),
                new ContentMeta(['key' => 'doctorVerifiedBy', 'value' => '1']),
                new ContentMeta(['key' => 'doctorVerificationRequest', 'value' => false]),
                new ContentMeta(['key' => 'doctorVerificationFile', 'value' => '']),

                // Retail
                new ContentMeta(['key' => 'retailName', 'value' => 'Amgalan Auto Plaza']),
                new ContentMeta(['key' => 'retailAddress', 'value' => 'БЗД, Амгалангийн тойрог / Нохойны хөшөөтэй/ зүүн тийш өнгөрөөд 300м яваад төв замын хойд талд']),
                new ContentMeta(['key' => 'retailOpenHours', 'value' => 'Monday to Saturday 9:00am to 18:00 pm Lunch 12:00 to 13:00']),
                new ContentMeta(['key' => 'retailWebsite', 'value' => 'www.yourdomain.com']),
                new ContentMeta(['key' => 'retailPhone', 'value' => '+976 99999999']),
                new ContentMeta(['key' => 'retailVehicles', 'value' => '132']),
                new ContentMeta(['key' => 'retailImage', 'value' => url('assets/car-web/img/retail.png')]),

                // Seller
                new ContentMeta(['key' => 'sellerDescription', 'value' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum ullam, explicabo iure delectus asperiores sed aliquam provident magnam similique accusantium magni! Neque dolorum similique aliquam id recusandae aliquid nihil sit, blanditiis corporis? Odit, repudiandae recusandae. Libero rem aliquid, distinctio vel ad ab nostrum nulla repellendus modi officia eligendi officiis ducimus labore? Ad, praesentium laborum fugiat vitae doloremque qui beatae consectetur.']),

                // Diagnostic
                new ContentMeta(['key' => 'diagnosticConditionImage', 'value' => url('assets/car-web/img/retail.png')]),

                // Options - Exterior
                new ContentMeta(['key' => 'optionExteriorSunroof', 'value' => true]),
                new ContentMeta(['key' => 'optionExteriorAluminumWheel', 'value' => true]),
                new ContentMeta(['key' => 'optionExterior4SeasonTire', 'value' => true]),
                new ContentMeta(['key' => 'optionExteriorElectricSideMirror', 'value' => true]),
                new ContentMeta(['key' => 'optionExteriorRearWiper', 'value' => true]),

                // Options - Guts
                new ContentMeta(['key' => 'optionGutsSteerRemoteControl', 'value' => true]),
                new ContentMeta(['key' => 'optionGutsPowerSteering', 'value' => true]),
                new ContentMeta(['key' => 'optionGutsLeatherSeat', 'value' => true]),
                new ContentMeta(['key' => 'optionGutsElectricSeatDriverSeat', 'value' => true]),
                new ContentMeta(['key' => 'optionGutsElectricSeatPassengerSeat', 'value' => true]),
                new ContentMeta(['key' => 'optionGutsHeatedSeatDriverSeat', 'value' => true]),
                new ContentMeta(['key' => 'optionGutsHeatedSeatRearSeat', 'value' => true]),
                new ContentMeta(['key' => 'optionGutsMemorySeatDriverSeat', 'value' => true]),
                new ContentMeta(['key' => 'optionGutsPowerDoorLock', 'value' => true]),

                // Options - Safety
                new ContentMeta(['key' => 'optionSafetyAirbagDriverSeat', 'value' => true]),
                new ContentMeta(['key' => 'optionSafetyAirbagPassengerSeat', 'value' => true]),
                new ContentMeta(['key' => 'optionSafetyAirbagSide', 'value' => true]),
                new ContentMeta(['key' => 'optionSafetyAirbagCurtains', 'value' => true]),
                new ContentMeta(['key' => 'optionSafetyCameraFront', 'value' => true]),
                new ContentMeta(['key' => 'optionSafetyCameraRear', 'value' => true]),
                new ContentMeta(['key' => 'optionSafetyCameraSide', 'value' => true]),
                new ContentMeta(['key' => 'optionSafetyParkingSenseRear', 'value' => true]),
                new ContentMeta(['key' => 'optionSafetyParkingSenseFront', 'value' => true]),
                new ContentMeta(['key' => 'optionSafetyABS', 'value' => true]),
                new ContentMeta(['key' => 'optionSafetyElectricParkingBrake', 'value' => true]),

                // Options - Convenience
                new ContentMeta(['key' => 'optionConvenienceSmartKey', 'value' => true]),
                new ContentMeta(['key' => 'optionConvenienceCruiseControl', 'value' => true]),
                new ContentMeta(['key' => 'optionConvenienceAutoAirCondition', 'value' => true]),
                new ContentMeta(['key' => 'optionConveniencePowerWindow', 'value' => true]),
                new ContentMeta(['key' => 'optionConvenienceCDPlayer', 'value' => true]),
                new ContentMeta(['key' => 'optionConvenienceNavigation', 'value' => true]),
                new ContentMeta(['key' => 'optionConvenienceUSBTerminal', 'value' => true]),
                new ContentMeta(['key' => 'optionConvenienceAUXTerminal', 'value' => true]),
                new ContentMeta(['key' => 'optionConvenienceBluetooth', 'value' => true]),
                new ContentMeta(['key' => 'optionConvenienceAutoLight', 'value' => true]),
                new ContentMeta(['key' => 'optionConvenienceRainSenser', 'value' => true]),
                new ContentMeta(['key' => 'optionConvenienceAVMonitorFront', 'value' => true]),
                new ContentMeta(['key' => 'optionConvenienceAVMonitorRear', 'value' => true]),
                new ContentMeta(['key' => 'optionConvenienceBlinderRear', 'value' => true]),
                new ContentMeta(['key' => 'optionConvenienceBlackBox', 'value' => true]),

                // Options - Clean
                new ContentMeta(['key' => 'optionCleanOnePersonDrive', 'value' => true]),
                new ContentMeta(['key' => 'optionCleanNoSmoking', 'value' => true]),
                new ContentMeta(['key' => 'optionCleanWomanDriver', 'value' => true]),

                // Publishing
                new ContentMeta(['key' => 'publishType', 'value' => $publishTypes[array_rand($publishTypes)]]),
                new ContentMeta(['key' => 'publishPriceAmount', 'value' => rand(10000, 50000)]),
                new ContentMeta(['key' => 'publishPriceUnit', 'value' => 'tugrug']),
                new ContentMeta(['key' => 'publishTotalPriceAmount', 'value' => rand(100000, 500000)]),
                new ContentMeta(['key' => 'publishTotalPriceUnit', 'value' => 'tugrug']),
                new ContentMeta(['key' => 'publishDuration', 'value' => rand(1, 31)]),
                new ContentMeta(['key' => 'publishVerified', 'value' => rand(0, 1) ? true : false]),
                new ContentMeta(['key' => 'publishVerifiedBy', 'value' => 1]),
                new ContentMeta(['key' => 'publishVerifiedAt', 'value' => now()]),
                new ContentMeta(['key' => 'publishVerifiedEnd', 'value' => now()->addDays(rand(1, 31))]),
            ]);

            $content->metas()->saveMany($medias);

            $value = new \stdClass;
            $value->datetime = $time;
            $value->filename_changed = true;
            $value->before = $content;
            $value->after = $content;
            $value->user = User::find($content->author_id);

            $content_meta = new ContentMeta();
            $content_meta->content_id = $content->id;
            $content_meta->key = 'initial';
            $content_meta->value = json_encode($value);
            $content_meta->save();

            // $file_content = file_get_contents(resource_path('stubs/carPost.stub'));
            // $file_name = $rootPath . DIRECTORY_SEPARATOR . $content->slug . Content::NAMING_CONVENTION . $content->status . Content::NAMING_CONVENTION . $time;
            // $file_ext = 'blade.php';
            // $file_path = $file_name . '.' . $file_ext;

            // file_put_contents(base_path($file_path), $file_content);
        });
    }
}
