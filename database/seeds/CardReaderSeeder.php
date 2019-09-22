<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CardReaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('card_datas')->insert([
            'car_id' => 1,
            'card_data' => '{VehicleData:{DateOfFirstRegistration:29.01.2004,YearOfProduction:2004,VehicleMake:ZASTAVA,VehicleType:-,CommercialDescription:YUGO KORAL1.3I,VehicleIDNumber:VX1145A0001081421,RegistrationNumberOfVehicle:NS007-DC,MaximumNetPower:49,EngineCapacity:1298,TypeOfFuel:BENZIN GAS,PowerWeightRatio:0,VehicleMass:910,MaximumPermissibleLadenMass:1230,TypeApprovalNumber:-,NumberOfSeats:5,NumberOfStandingPlaces:0,EngineIDNumber:13MA0640088144,NumberOfAxles:2,VehicleCategory:PUTNICKO VOZILO,ColourOfVehicle:3D CRVENA TAMNA,RestrictionToChangeOwner:,VehicleLoad:0},DocumentData:{StateIssuing:REPUBLIKA SRBIJA,CompetentAuthority:MINISTARSTVO UNUTRASNJIH POSLOVA REPUBLIKE SRBIJE,AuthorityIssuing:PU U NOVOM SADU,UnambiguousNumber:1114335,IssuingDate:24.01.2011,ExpiryDate:24.01.2018,SerialNumber:8172ff0000ed9a},PersonalData:{OwnersPersonalNo:2108982800040,OwnersSurnameOrBusinessName:JUHAS,OwnerName:SLOBODAN,OwnerAddress:NOVI SAD,NOVI SAD,STOJANA NOVAKOVICA,006,,,UsersPersonalNo:,UsersSurnameOrBusinessName:,UsersName:,UsersAddress:},RegistrationData:[]},email:test@gmail.com,key:test,',
            'created_at' => '2018-02-18 01:20:44',
            'updated_at' => '2018-02-18 01:20:44',
        ]);
    }
}
