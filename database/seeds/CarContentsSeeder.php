<?php

use Illuminate\Database\Seeder;

class CarContentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = time();
        $rootPath = config('content.cars.rootPath');

        factory(App\Content::class, 30)->create(['type' => App\Content::TYPE_CAR])->each(function ($content) use($time, $rootPath) {

            $carUserRandomId = \App\User::whereHas('groups', function ($query) {
                $query->where('type', \App\Group::TYPE_DYNAMIC);
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
            for ($i=0; $i < $mediasLimit; $i++) {
                $media = $lorempixelUrl . '/' . $mediaWidth . '/' . $mediaHeight . '/' . $lorempixelType . '/?=' . rand(1, 50000);
                $meta = new App\ContentMeta(['key' => 'medias', 'value' => $media]);
                array_push($medias, $meta);
            }

            $content->metas()->saveMany([
                new App\ContentMeta(['key' => 'plateNumber', 'value' => '0035UNA']),
                new App\ContentMeta(['key' => 'cabinNumber', 'value' => 'VF3 3CRFNC 12345678']),
                new App\ContentMeta(['key' => 'countryName', 'value' => 'Korea']),
                new App\ContentMeta(['key' => 'markName', 'value' => 'toyota']),
                new App\ContentMeta(['key' => 'modelName', 'value' => 'prius']),
                new App\ContentMeta(['key' => 'type', 'value' => 'Sedan']),
                new App\ContentMeta(['key' => 'className', 'value' => 'luxury']),
                new App\ContentMeta(['key' => 'manCount', 'value' => '4']),
                new App\ContentMeta(['key' => 'weight', 'value' => '1200kg']),
                new App\ContentMeta(['key' => 'mass', 'value' => '1200kg']),
                new App\ContentMeta(['key' => 'fuelType', 'value' => 'gas']),
                new App\ContentMeta(['key' => 'width', 'value' => '160cm']),
                new App\ContentMeta(['key' => 'height', 'value' => '120cm']),
                new App\ContentMeta(['key' => 'capacity', 'value' => '1500cc']),
                new App\ContentMeta(['key' => 'motorNumber', 'value' => '2H2tXA598WDY987665']),
                new App\ContentMeta(['key' => 'colorName', 'value' => 'black']),
                new App\ContentMeta(['key' => 'axleCount', 'value' => '2']),
                new App\ContentMeta(['key' => 'certificateNumber', 'value' => '2H2tXA598WDY987665']),
                new App\ContentMeta(['key' => 'importDate', 'value' => '2006']),
                new App\ContentMeta(['key' => 'intent', 'value' => 'use']),
                new App\ContentMeta(['key' => 'transmission', 'value' => 'automatic']),
                new App\ContentMeta(['key' => 'archiveDate', 'value' => '2008']),
                new App\ContentMeta(['key' => 'buildYear', 'value' => '2003']),
                new App\ContentMeta(['key' => 'archiveFirstNumber', 'value' => 'A598WDY987']),
                new App\ContentMeta(['key' => 'wheelPosition', 'value' => 'left']),
                new App\ContentMeta(['key' => 'length', 'value' => '4m']),
                new App\ContentMeta(['key' => 'archiveNumber', 'value' => 'A598WDY987']),
                new App\ContentMeta(['key' => 'carCondition', 'value' => 'used']),
                new App\ContentMeta(['key' => 'importDate', 'value' => '2006']),
                new App\ContentMeta(['key' => 'wheelDrive', 'value' => 'back']),
                new App\ContentMeta(['key' => 'mileage', 'value' => '5000km']),
                new App\ContentMeta(['key' => 'advantages', 'value' => 'used in womans hand']),
                new App\ContentMeta(['key' => 'price', 'value' => '10000000']),
                new App\ContentMeta(['key' => 'priceType', 'value' => 'loan']),
                new App\ContentMeta(['key' => 'thumbnail', 'value' => $thumbnail]),
                new App\ContentMeta(['key' => 'link', 'value' => 'https://www.youtube.com/watch?v=2RnGwkWL94I']),
                new App\ContentMeta(['key' => 'buyout', 'value' => '10000000']),
                new App\ContentMeta(['key' => 'startPrice', 'value' => '8000000']),
                new App\ContentMeta(['key' => 'maxBid', 'value' => '14000000']),
                new App\ContentMeta(['key' => 'startsAt', 'value' => '2019-09-15']),
                new App\ContentMeta(['key' => 'endsAt', 'value' => '2019-09-18']),

                new App\ContentMeta(['key' => 'engine', 'value' => '1499 L']),
                new App\ContentMeta(['key' => 'chassis', 'value' => '4 WD']),
                new App\ContentMeta(['key' => 'speedLimit', 'value' => '180 km/h']),
                new App\ContentMeta(['key' => 'colorNameInterior', 'value' => 'beige']),
                new App\ContentMeta(['key' => 'colorNameExterior', 'value' => 'black']),
                new App\ContentMeta(['key' => 'doorCount', 'value' => '4']),

                // Retail
                new App\ContentMeta(['key' => 'retailName', 'value' => 'Amgalan Auto Plaza']),
                new App\ContentMeta(['key' => 'retailAddress', 'value' => 'БЗД, Амгалангийн тойрог / Нохойны хөшөөтэй/ зүүн тийш өнгөрөөд 300м яваад төв замын хойд талд']),
                new App\ContentMeta(['key' => 'retailOpenHours', 'value' => 'Monday to Saturday 9:00am to 18:00 pm Lunch 12:00 to 13:00']),
                new App\ContentMeta(['key' => 'retailWebsite', 'value' => 'www.yourdomain.com']),
                new App\ContentMeta(['key' => 'retailPhone', 'value' => '+976 99999999']),
                new App\ContentMeta(['key' => 'retailVehicles', 'value' => '132']),
                new App\ContentMeta(['key' => 'retailImage', 'value' => url('assets/car-web/img/retail.png')]),

                // Seller
                new App\ContentMeta(['key' => 'sellerDescription', 'value' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum ullam, explicabo iure delectus asperiores sed aliquam provident magnam similique accusantium magni! Neque dolorum similique aliquam id recusandae aliquid nihil sit, blanditiis corporis? Odit, repudiandae recusandae. Libero rem aliquid, distinctio vel ad ab nostrum nulla repellendus modi officia eligendi officiis ducimus labore? Ad, praesentium laborum fugiat vitae doloremque qui beatae consectetur.']),

                // Diagnostic
                new App\ContentMeta(['key' => 'diagnosticConditionImage', 'value' => url('assets/car-web/img/retail.png')]),

                // Options - Exterior
                new App\ContentMeta(['key' => 'optionExteriorSunroof', 'value' => true]),
                new App\ContentMeta(['key' => 'optionExteriorAluminumWheel', 'value' => true]),
                new App\ContentMeta(['key' => 'optionExterior4SeasonTire', 'value' => true]),
                new App\ContentMeta(['key' => 'optionExteriorElectricSideMirror', 'value' => true]),
                new App\ContentMeta(['key' => 'optionExteriorRearWiper', 'value' => true]),

                // Options - Guts
                new App\ContentMeta(['key' => 'optionGutsSteerRemoteControl', 'value' => true]),
                new App\ContentMeta(['key' => 'optionGutsPowerSteering', 'value' => true]),
                new App\ContentMeta(['key' => 'optionGutsLeatherSeat', 'value' => true]),
                new App\ContentMeta(['key' => 'optionGutsElectricSeatDriverSeat', 'value' => true]),
                new App\ContentMeta(['key' => 'optionGutsElectricSeatPassengerSeat', 'value' => true]),
                new App\ContentMeta(['key' => 'optionGutsHeatedSeatDriverSeat', 'value' => true]),
                new App\ContentMeta(['key' => 'optionGutsHeatedSeatRearSeat', 'value' => true]),
                new App\ContentMeta(['key' => 'optionGutsMemorySeatDriverSeat', 'value' => true]),
                new App\ContentMeta(['key' => 'optionGutsPowerDoorLock', 'value' => true]),

                // Options - Safety
                new App\ContentMeta(['key' => 'optionSafetyAirbagDriverSeat', 'value' => true]),
                new App\ContentMeta(['key' => 'optionSafetyAirbagPassengerSeat', 'value' => true]),
                new App\ContentMeta(['key' => 'optionSafetyAirbagSide', 'value' => true]),
                new App\ContentMeta(['key' => 'optionSafetyAirbagCurtains', 'value' => true]),
                new App\ContentMeta(['key' => 'optionSafetyCameraFront', 'value' => true]),
                new App\ContentMeta(['key' => 'optionSafetyCameraRear', 'value' => true]),
                new App\ContentMeta(['key' => 'optionSafetyCameraSide', 'value' => true]),
                new App\ContentMeta(['key' => 'optionSafetyParkingSenseRear', 'value' => true]),
                new App\ContentMeta(['key' => 'optionSafetyParkingSenseFront', 'value' => true]),
                new App\ContentMeta(['key' => 'optionSafetyABS', 'value' => true]),
                new App\ContentMeta(['key' => 'optionSafetyElectricParkingBrake', 'value' => true]),

                // Options - Convenience
                new App\ContentMeta(['key' => 'optionConvenienceSmartKey', 'value' => true]),
                new App\ContentMeta(['key' => 'optionConvenienceCruiseControl', 'value' => true]),
                new App\ContentMeta(['key' => 'optionConvenienceAutoAirCondition', 'value' => true]),
                new App\ContentMeta(['key' => 'optionConveniencePowerWindow', 'value' => true]),
                new App\ContentMeta(['key' => 'optionConvenienceCDPlayer', 'value' => true]),
                new App\ContentMeta(['key' => 'optionConvenienceNavigation', 'value' => true]),
                new App\ContentMeta(['key' => 'optionConvenienceUSBTerminal', 'value' => true]),
                new App\ContentMeta(['key' => 'optionConvenienceAUXTerminal', 'value' => true]),
                new App\ContentMeta(['key' => 'optionConvenienceBluetooth', 'value' => true]),
                new App\ContentMeta(['key' => 'optionConvenienceAutoLight', 'value' => true]),
                new App\ContentMeta(['key' => 'optionConvenienceRainSenser', 'value' => true]),
                new App\ContentMeta(['key' => 'optionConvenienceAVMonitorFront', 'value' => true]),
                new App\ContentMeta(['key' => 'optionConvenienceAVMonitorRear', 'value' => true]),
                new App\ContentMeta(['key' => 'optionConvenienceBlinderRear', 'value' => true]),
                new App\ContentMeta(['key' => 'optionConvenienceBlackBox', 'value' => true]),

                // Options - Clean
                new App\ContentMeta(['key' => 'optionCleanOnePersonDrive', 'value' => true]),
                new App\ContentMeta(['key' => 'optionCleanNoSmoking', 'value' => true]),
                new App\ContentMeta(['key' => 'optionCleanWomanDriver', 'value' => true]),
            ]);

            $content->metas()->saveMany($medias);

            $value = new \stdClass;
            $value->datetime = $time;
            $value->filename_changed = true;
            $value->before = $content;
            $value->after = $content;
            $value->user = \App\User::find($content->author_id);

            $content_meta = new \App\ContentMeta();
            $content_meta->content_id = $content->id;
            $content_meta->key = 'initial';
            $content_meta->value = json_encode($value);
            $content_meta->save();

            $file_content = file_get_contents(resource_path('stubs/car.stub'));
            $file_name = $rootPath . DIRECTORY_SEPARATOR . $content->slug . \App\Content::NAMING_CONVENTION . $content->status . \App\Content::NAMING_CONVENTION . $time;
            $file_ext = 'blade.php';
            $file_path = $file_name . '.' . $file_ext;

            file_put_contents(base_path($file_path), $file_content);
        });
    }
}
