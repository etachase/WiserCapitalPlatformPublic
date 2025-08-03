<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'first_name' => 'Vick',
                'last_name' => 'G',
                'username' => 'vg@wisercapital.com',
                'email' => 'vg@wisercapital.com',
                'password' => '$2y$10$W1EV8Yv5F7Jp8QPDl7iOhu/9NTx6XOMLyciHF0/FN30alpMRVSfoW',
                'remember_token' => 'e4Yii7d9QdUR2khXtl2C6YwGbDhBT5Vap9V5YSrYB76HfTVfi1tqzUUg7C4w',
                'created_at' => '2016-05-19 23:53:59',
                'updated_at' => '2016-07-28 19:55:25',
                'enabled' => 1,
                'auth_type' => 'internal',
                'company_id' => 0,
                'is_complete_profile' => 0,
            ),
            1 => 
            array (
                'id' => 18,
                'first_name' => 'John',
                'last_name' => 'Doe',
                'username' => 'investor@mail.com',
                'email' => 'investor@mail.com',
                'password' => '$2y$10$Q5fIo2bkbVuEVEy6wcbHi.l6HP.T0rAPxflIxKUdqPK9B7AxW3idG',
                'remember_token' => NULL,
                'created_at' => '2016-06-23 16:29:48',
                'updated_at' => '2016-06-23 16:30:59',
                'enabled' => 1,
                'auth_type' => 'internal',
                'company_id' => 0,
                'is_complete_profile' => 0,
            ),
            2 => 
            array (
                'id' => 19,
                'first_name' => 'Sara',
                'last_name' => 'Doe',
                'username' => 'hostfacility@mail.com',
                'email' => 'hostfacility@mail.com',
                'password' => '$2y$10$llxHY29JGboRA6FXvvmrUeET4kxU17qsOzmKfTWPru4qSVK4.QoBO',
                'remember_token' => 'Y9x8N09NmVZTFEZopbeii6RzEdseOwgX5dhL79VgUbwPnjkWeLKrlDqxrFDI',
                'created_at' => '2016-06-23 16:30:40',
                'updated_at' => '2016-07-20 21:31:52',
                'enabled' => 1,
                'auth_type' => 'internal',
                'company_id' => 0,
                'is_complete_profile' => 0,
            ),
            3 => 
            array (
                'id' => 20,
                'first_name' => 'Jasmine',
                'last_name' => 'Showers',
                'username' => 'jas@wisercapital.com',
                'email' => 'jas@wisercapital.com',
                'password' => '$2y$10$0NP2ttaEs8qhgaLyxmOYbeObJyZE1PlpF5tAWa2gtQDeMByYCCXZu',
                'remember_token' => NULL,
                'created_at' => '2016-06-23 16:34:40',
                'updated_at' => '2016-06-23 16:34:40',
                'enabled' => 1,
                'auth_type' => 'internal',
                'company_id' => 0,
                'is_complete_profile' => 0,
            ),
            4 => 
            array (
                'id' => 22,
                'first_name' => 'Stephen',
                'last_name' => 'Honikman',
                'username' => 'sch@wisercapital.com',
                'email' => 'sch@wisercapital.com',
                'password' => '$2y$10$LI1wqEVi8MI0.YxtJx.RIuaeXOnbjpxCZPixINvGS4NO5cD4EEDFu',
                'remember_token' => NULL,
                'created_at' => '2016-06-23 16:36:05',
                'updated_at' => '2016-06-23 16:36:06',
                'enabled' => 1,
                'auth_type' => 'internal',
                'company_id' => 0,
                'is_complete_profile' => 0,
            ),
            5 => 
            array (
                'id' => 23,
                'first_name' => 'Nathan',
                'last_name' => 'Homan',
                'username' => 'nrh@wisercapital.com',
                'email' => 'nrh@wisercapital.com',
                'password' => '$2y$10$JTXxHcdcX7DOxDRSc1cCquRQjDHI4l8MZagWfNZPE4cDYrHL/A4de',
                'remember_token' => NULL,
                'created_at' => '2016-06-23 16:36:39',
                'updated_at' => '2016-06-23 16:36:40',
                'enabled' => 1,
                'auth_type' => 'internal',
                'company_id' => 0,
                'is_complete_profile' => 0,
            ),
            6 => 
            array (
                'id' => 24,
                'first_name' => 'Rebecca',
                'last_name' => 'Tannebring',
                'username' => 'rmt@wisercapital.com',
                'email' => 'rmt@wisercapital.com',
                'password' => '$2y$10$ROCZWoH8m4vbLwrv3DJrEePOjlCvMmJ3Pvp4WXNpPyWQA1/2ym6kK',
                'remember_token' => NULL,
                'created_at' => '2016-06-23 16:37:21',
                'updated_at' => '2016-06-23 16:37:22',
                'enabled' => 1,
                'auth_type' => 'internal',
                'company_id' => 0,
                'is_complete_profile' => 0,
            ),
            7 => 
            array (
                'id' => 25,
                'first_name' => 'Megan',
                'last_name' => 'Byrn',
                'username' => 'mnb@wisercapital.com',
                'email' => 'mnb@wisercapital.com',
                'password' => '$2y$10$rqvonsbthoyBkZaz.YhxGO4ebF5CJrNu227uY/wH8gAXgY7r3Uc/i',
                'remember_token' => NULL,
                'created_at' => '2016-06-23 16:37:49',
                'updated_at' => '2016-06-23 16:37:49',
                'enabled' => 1,
                'auth_type' => 'internal',
                'company_id' => 0,
                'is_complete_profile' => 0,
            ),
            8 => 
            array (
                'id' => 26,
                'first_name' => 'Alex',
                'last_name' => 'Brotman',
                'username' => 'ab@wisercapital.com',
                'email' => 'ab@wisercapital.com',
                'password' => '$2y$10$8Xsy4E8MX1I/P7TIXQ8Vpu7XaQfaPccF6eiy6WPxkacNdqWBIOcj.',
                'remember_token' => NULL,
                'created_at' => '2016-06-23 16:38:14',
                'updated_at' => '2016-06-23 16:38:15',
                'enabled' => 1,
                'auth_type' => 'internal',
                'company_id' => 0,
                'is_complete_profile' => 0,
            ),
            9 => 
            array (
                'id' => 27,
                'first_name' => 'Siddharta',
                'last_name' => 'P',
                'username' => 'sid.successive@gmail.com',
                'email' => 'sid.successive@gmail.com',
                'password' => '$2y$10$U.xN.0aHH6cEusAvPcvK6eLCLTidTFVJOMnz5w1zGKVXG9sUY3rjG',
                'remember_token' => NULL,
                'created_at' => '2016-06-23 22:41:12',
                'updated_at' => '2016-06-23 22:41:12',
                'enabled' => 1,
                'auth_type' => 'internal',
                'company_id' => 0,
                'is_complete_profile' => 0,
            ),
            10 => 
            array (
                'id' => 28,
                'first_name' => 'John',
                'last_name' => 'Doe',
                'username' => 'admin@mail.com',
                'email' => 'admin@mail.com',
                'password' => '$2y$10$PUaw7gFrU.dMjsWgylLjh.BpZKFPmSovJTKzjiqRDAMQbBE6DMeHy',
                'remember_token' => NULL,
                'created_at' => '2016-06-23 22:41:56',
                'updated_at' => '2016-07-20 21:33:49',
                'enabled' => 1,
                'auth_type' => 'internal',
                'company_id' => 0,
                'is_complete_profile' => 0,
            ),
            11 => 
            array (
                'id' => 29,
                'first_name' => 'Peter',
                'last_name' => 'Doe',
                'username' => '',
                'email' => 'solarinstaller@mail.com',
                'password' => '$2y$10$A0hf1B03tYirzH8OBGGdieHEJyullx2thrpcWWffF7TtvfcrtW.Sy',
                'remember_token' => 'YwRBt5wEPFjx0VB3iSOrfgU71Pz37atJvpFhRN0vGqusYb6l833xzEz2Cpp2',
                'created_at' => '2016-07-28 19:54:08',
                'updated_at' => '2016-07-28 19:59:38',
                'enabled' => 1,
                'auth_type' => 'internal',
                'company_id' => 0,
                'is_complete_profile' => 0,
            ),
            12 => 
            array (
                'id' => 30,
                'first_name' => 'Mary',
                'last_name' => 'Doe',
                'username' => 'mary.doe@solarcity.com',
                'email' => 'mary.doe@solarcity.com',
                'password' => '$2y$10$XM2K/PgbotnYwOtU.fV2AeMNz5TbgSc7yNLvXDr5DiCZMkB.rw0z2',
                'remember_token' => NULL,
                'created_at' => '2016-07-28 19:59:59',
                'updated_at' => '2016-07-28 20:01:36',
                'enabled' => 1,
                'auth_type' => 'internal',
                'company_id' => 0,
                'is_complete_profile' => 1,
            ),
        ));
        
        
    }
}
