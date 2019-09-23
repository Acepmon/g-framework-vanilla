@if ($content)
<section class="detail-items bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="detail-option-information">
                    <div class="detail-section-title">Option information</div>
                    <div class="row p-3">
                        <div class="col-md-2 p-0">
                            <div class="title">Exterior</div>
                            <div class="info-list">
                                <ul>
                                    @if ($content->metaValue('optionExteriorSunroof'))
                                    <li><i class="fab fa fa-check"></i> Sunroof</li>
                                    @endif

                                    @if ($content->metaValue('optionExteriorAluminumWheel'))
                                    <li><i class="fab fa fa-check"></i> Aluminum wheel</li>
                                    @endif

                                    @if ($content->metaValue('optionExterior4SeasonTire'))
                                    <li><i class="fab fa fa-check"></i> 4 season tire</li>
                                    @endif

                                    @if ($content->metaValue('optionExteriorElectricSideMirror'))
                                    <li><i class="fab fa fa-check"></i> Electric folding side mirror</li>
                                    @endif

                                    @if ($content->metaValue('optionExteriorRearWiper'))
                                    <li><i class="fab fa fa-check"></i> Rear wiper</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2 p-0">
                            <div class="title">Guts</div>
                            <div class="info-list">
                                <ul>
                                    @if ($content->metaValue('optionGutsSteerRemoteControl'))
                                    <li><i class="fab fa fa-check"></i> Steering wheel remote control</li>
                                    @endif

                                    @if ($content->metaValue('optionGutsPowerSteering'))
                                    <li><i class="fab fa fa-check"></i> Power steering</li>
                                    @endif

                                    @if ($content->metaValue('optionGutsLeatherSeat'))
                                    <li><i class="fab fa fa-check"></i> Leather seat</li>
                                    @endif

                                    @if ($content->metaValue('optionGutsElectricSeatDriverSeat'))
                                    <li><i class="fab fa fa-check"></i> Electric seat: Driver's seat</li>
                                    @endif

                                    @if ($content->metaValue('optionGutsElectricSeatPassengerSeat'))
                                    <li><i class="fab fa fa-check"></i> Electric seat: Passenger's seat</li>
                                    @endif

                                    @if ($content->metaValue('optionGutsHeatedSeatDriverSeat'))
                                    <li><i class="fab fa fa-check"></i> Heated seat: Driver's seat</li>
                                    @endif

                                    @if ($content->metaValue('optionGutsHeatedSeatRearSeat'))
                                    <li><i class="fab fa fa-check"></i> Heated seat: Rear seat</li>
                                    @endif

                                    @if ($content->metaValue('optionGutsMemorySeatDriverSeat'))
                                    <li><i class="fab fa fa-check"></i> Memory seat: Driver's seat</li>
                                    @endif

                                    @if ($content->metaValue('optionGutsPowerDoorLock'))
                                    <li><i class="fab fa fa-check"></i> Power Door Lock</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 p-0">
                            <div class="title">Safety</div>
                            <div class="info-list">
                                <ul>
                                    @if ($content->metaValue('optionSafetyAirbagDriverSeat'))
                                    <li><i class="fab fa fa-check"></i> Airbag: Driver's seat</li>
                                    @endif

                                    @if ($content->metaValue('optionSafetyAirbagPassengerSeat'))
                                    <li><i class="fab fa fa-check"></i> Airbag: Passenger's seat</li>
                                    @endif

                                    @if ($content->metaValue('optionSafetyAirbagSide'))
                                    <li><i class="fab fa fa-check"></i> Airbag: Side</li>
                                    @endif

                                    @if ($content->metaValue('optionSafetyAirbagCurtains'))
                                    <li><i class="fab fa fa-check"></i> Airbag: Curtains</li>
                                    @endif

                                    @if ($content->metaValue('optionSafetyCameraFront'))
                                    <li><i class="fab fa fa-check"></i> Camera: Front</li>
                                    @endif

                                    @if ($content->metaValue('optionSafetyCameraRear'))
                                    <li><i class="fab fa fa-check"></i> Camera: Rear</li>
                                    @endif

                                    @if ($content->metaValue('optionSafetyCameraSide'))
                                    <li><i class="fab fa fa-check"></i> Camera: Side</li>
                                    @endif

                                    @if ($content->metaValue('optionSafetyParkingSenseRear'))
                                    <li><i class="fab fa fa-check"></i> Parking Sense: Rear</li>
                                    @endif

                                    @if ($content->metaValue('optionSafetyParkingSenseFront'))
                                    <li><i class="fab fa fa-check"></i> Parking Sense: Front</li>
                                    @endif

                                    @if ($content->metaValue('optionSafetyABS'))
                                    <li><i class="fab fa fa-check"></i> ABS</li>
                                    @endif

                                    @if ($content->metaValue('optionSafetyElectricParkingBrake'))
                                    <li><i class="fab fa fa-check"></i> Electric Parking Brake</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 p-0">
                            <div class="title">Convenience</div>
                            <div class="info-list">
                                <ul>
                                    @if ($content->metaValue('optionConvenienceSmartKey'))
                                    <li><i class="fab fa fa-check"></i> Smart Key</li>
                                    @endif

                                    @if ($content->metaValue('optionConvenienceCruiseControl'))
                                    <li><i class="fab fa fa-check"></i> Cruise Control</li>
                                    @endif

                                    @if ($content->metaValue('optionConvenienceAutoAirCondition'))
                                    <li><i class="fab fa fa-check"></i> Auto Air Conditioner</li>
                                    @endif

                                    @if ($content->metaValue('optionConveniencePowerWindow'))
                                    <li><i class="fab fa fa-check"></i> Power Window</li>
                                    @endif

                                    @if ($content->metaValue('optionConvenienceCDPlayer'))
                                    <li><i class="fab fa fa-check"></i> CD Player</li>
                                    @endif

                                    @if ($content->metaValue('optionConvenienceNavigation'))
                                    <li><i class="fab fa fa-check"></i> Navigation</li>
                                    @endif

                                    @if ($content->metaValue('optionConvenienceUSBTerminal'))
                                    <li><i class="fab fa fa-check"></i> USB Terminal</li>
                                    @endif

                                    @if ($content->metaValue('optionConvenienceAUXTerminal'))
                                    <li><i class="fab fa fa-check"></i> AUX Terminal</li>
                                    @endif

                                    @if ($content->metaValue('optionConvenienceBluetooth'))
                                    <li><i class="fab fa fa-check"></i> Bluetooth</li>
                                    @endif

                                    @if ($content->metaValue('optionConvenienceAutoLight'))
                                    <li><i class="fab fa fa-check"></i> Auto Light</li>
                                    @endif

                                    @if ($content->metaValue('optionConvenienceRainSenser'))
                                    <li><i class="fab fa fa-check"></i> Rain Senser</li>
                                    @endif

                                    @if ($content->metaValue('optionConvenienceAVMonitorFront'))
                                    <li><i class="fab fa fa-check"></i> AV Monitor: Front</li>
                                    @endif

                                    @if ($content->metaValue('optionConvenienceAVMonitorRear'))
                                    <li><i class="fab fa fa-check"></i> AV Monitor: Rear</li>
                                    @endif

                                    @if ($content->metaValue('optionConvenienceBlinderRear'))
                                    <li><i class="fab fa fa-check"></i> Blinder: Rear</li>
                                    @endif

                                    @if ($content->metaValue('optionConvenienceBlackBox'))
                                    <li><i class="fab fa fa-check"></i> Black Box</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2 p-0">
                            <div class="title">Clean</div>
                            <div class="info-list">
                                <ul>
                                    @if ($content->metaValue('optionCleanOnePersonDrive'))
                                    <li><i class="fab fa fa-check"></i> One Person Drive</li>
                                    @endif

                                    @if ($content->metaValue('optionCleanNoSmoking'))
                                    <li><i class="fab fa fa-check"></i> No Smoking</li>
                                    @endif

                                    @if ($content->metaValue('optionCleanWomanDriver'))
                                    <li><i class="fab fa fa-check"></i> Woman Driver</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
</section>
@endif
