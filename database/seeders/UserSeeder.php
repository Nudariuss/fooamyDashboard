<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserMobile;
use App\Models\UserWeb;
use App\Models\UserGoogleAuth;
use App\Models\UserProfile;
use App\Models\LoginHistory;
use App\Models\Otp;
use App\Models\Staff;
use App\Models\StaffLogin;
use App\Models\DriverHistory;
use App\Models\Mitra;
use App\Models\MitraPic;
use App\Models\MitraPicContact;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            [
                'name' => 'John Doe',
                'password' => bcrypt('password123'),
                'role' => 'Customer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'password' => bcrypt('password456'),
                'role' => 'Operational',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Alex Johnson',
                'password' => bcrypt('password789'),
                'role' => 'Mitra',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Emily Davis',
                'password' => bcrypt('admin123'),
                'role' => 'Admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Michael Brown',
                'password' => bcrypt('manager456'),
                'role' => 'Management',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Robert Taylor',
                'password' => bcrypt('passwordrobert'),
                'role' => 'Operational',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Linda Wilson',
                'password' => bcrypt('passwordlinda'),
                'role' => 'Operational',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'William Moore',
                'password' => bcrypt('passwordwilliam'),
                'role' => 'Operational',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Elizabeth Anderson',
                'password' => bcrypt('passwordelizabeth'),
                'role' => 'Operational',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sarah Lee',
                'password' => bcrypt('passwordlee'),
                'role' => 'Mitra',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Daniel Kim',
                'password' => bcrypt('passwordkim'),
                'role' => 'Mitra',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sophia Martinez',
                'password' => bcrypt('passwordmartinez'),
                'role' => 'Mitra',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'James Patel',
                'password' => bcrypt('passwordpatel'),
                'role' => 'Mitra',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Olivia Nguyen',
                'password' => bcrypt('passwordnguyen'),
                'role' => 'Mitra',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Liam Garcia',
                'password' => bcrypt('passwordgarcia'),
                'role' => 'Mitra',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ava Hernandez',
                'password' => bcrypt('passwordhernandez'),
                'role' => 'Mitra',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Noah Gonzalez',
                'password' => bcrypt('passwordgonzalez'),
                'role' => 'Mitra',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Emma Lopez',
                'password' => bcrypt('passwordlopez'),
                'role' => 'Mitra',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        UserMobile::insert([
            [
                'user_id' => 1, // John Doe (Customer)
                'phone_number' => '081234567890',
                'gender' => 'Male',
                'is_active' => true,
            ],
            [
                'user_id' => 2, // Jane Smith (Operational)
                'phone_number' => '081298765432',
                'gender' => 'Female',
                'is_active' => true,
            ],
            [
                'user_id' => 4, // Emily Davis (Admin)
                'phone_number' => '081223344556',
                'gender' => 'Female',
                'is_active' => true,
            ],
            [
                'user_id' => 5, // Michael Brown (Management)
                'phone_number' => '081233344455',
                'gender' => 'Male',
                'is_active' => true,
            ],
            [
                'user_id' => 6, // Robert Taylor (Operational)
                'phone_number' => '081277788899',
                'gender' => 'Male',
                'is_active' => true,
            ],
            [
                'user_id' => 7, // Linda Wilson (Operational)
                'phone_number' => '081211223344',
                'gender' => 'Female',
                'is_active' => false,
            ],
            [
                'user_id' => 8, // William Moore (Operational)
                'phone_number' => '081244556677',
                'gender' => 'Male',
                'is_active' => true,
            ],
            [
                'user_id' => 9, // Elizabeth Anderson (Operational)
                'phone_number' => '081244556674',
                'gender' => 'Female',
                'is_active' => true,
            ],
        ]);

        UserWeb::insert([
            [
                'user_id' => 3, // Alex Johnson (Mitra)
                'email' => 'alex.johnson@example.com',
                'is_active' => false,
            ],
            [
                'user_id' => 4, // Emily Davis (Admin)
                'email' => 'emily.davis@example.com',
                'is_active' => true,
            ],
            [
                'user_id' => 5, // Michael Brown (Management)
                'email' => 'michael.brown@example.com',
                'is_active' => true,
            ],
            [
                'user_id' => 10, // Sarah Lee (Mitra)
                'email' => 'sarah.lee@example.com',
                'is_active' => true,
            ],
            [
                'user_id' => 11, // Daniel Kim (Mitra)
                'email' => 'daniel.kim@example.com',
                'is_active' => true,
            ],
            [
                'user_id' => 12, // Sophia Martinez (Mitra)
                'email' => 'sophia.martinez@example.com',
                'is_active' => true,
            ],
            [
                'user_id' => 13, // James Patel (Mitra)
                'email' => 'james.patel@example.com',
                'is_active' => true,
            ],
            [
                'user_id' => 14, // Olivia Nguyen (Mitra)
                'email' => 'olivia.nguyen@example.com',
                'is_active' => true,
            ],
            [
                'user_id' => 15, // Liam Garcia (Mitra)
                'email' => 'liam.garcia@example.com',
                'is_active' => true,
            ],
            [
                'user_id' => 16, // Ava Hernandez (Mitra)
                'email' => 'ava.hernandez@example.com',
                'is_active' => true,
            ],
            [
                'user_id' => 17, // Noah Gonzalez (Mitra)
                'email' => 'noah.gonzalez@example.com',
                'is_active' => true,
            ],
        ]);

        UserGoogleAuth::insert([
            [
                'user_mobile_id' => 2, // Jane Smith (Operational)
                'google_id' => 'google_id_001',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_mobile_id' => 3, // Emily Davis (Admin)
                'google_id' => 'google_id_002',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_mobile_id' => 5, // Robert Taylor (Operational)
                'google_id' => 'google_id_003',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_mobile_id' => 7, // William Moore (Operational)
                'google_id' => 'google_id_004',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

        UserProfile::insert([
            [
                'user_id' => 2, // ID User Jane Smith
                'profile_picture' => 'uploads/profiles/jane_smith.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3, // ID User Alex Johnson
                'profile_picture' => 'uploads/profiles/alex_johnson.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 5, // ID User Michael Brown
                'profile_picture' => 'uploads/profiles/michael_brown.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        LoginHistory::insert([
            [
                'user_id' => 1,
                'device' => 'iPhone 12',
                'location' => 'Jakarta',
                'platform' => 'Mobile',
                'activity_date' => now()->subDays(1),
            ],
            [
                'user_id' => 2,
                'device' => 'Samsung Galaxy S21',
                'location' => 'Bandung',
                'platform' => 'Mobile',
                'activity_date' => now()->subDays(2),
            ],
            [
                'user_id' => 3,
                'device' => 'Dell XPS 15',
                'location' => 'Surabaya',
                'platform' => 'Website',
                'activity_date' => now()->subDays(3),
            ],
            [
                'user_id' => 4,
                'device' => 'MacBook Pro',
                'location' => 'Medan',
                'platform' => 'Website',
                'activity_date' => now()->subDays(4),
            ],
            [
                'user_id' => 5,
                'device' => 'Google Pixel 6',
                'location' => 'Bali',
                'platform' => 'Mobile',
                'activity_date' => now()->subDays(5),
            ],
            [
                'user_id' => 1,
                'device' => 'Samsung Galaxy Tab',
                'location' => 'Jakarta',
                'platform' => 'Mobile',
                'activity_date' => now()->subDays(6),
            ],
            [
                'user_id' => 4,
                'device' => 'Microsoft Surface',
                'location' => 'Medan',
                'platform' => 'Website',
                'activity_date' => now()->subDays(9),
            ],
            [
                'user_id' => 5,
                'device' => 'OnePlus 9',
                'location' => 'Bali',
                'platform' => 'Mobile',
                'activity_date' => now()->subDays(10),
            ],
            [
                'user_id' => 3,
                'device' => 'Huawei MateBook',
                'location' => 'Surabaya',
                'platform' => 'Website',
                'activity_date' => now()->subDays(13),
            ],
            [
                'user_id' => 4,
                'device' => 'Asus ROG',
                'location' => 'Medan',
                'platform' => 'Mobile',
                'activity_date' => now()->subDays(14),
            ],
            [
                'user_id' => 5,
                'device' => 'Google Nest Hub',
                'location' => 'Bali',
                'platform' => 'Mobile',
                'activity_date' => now()->subDays(15),
            ],
        ]);

        Otp::insert([
            [
                'user_id' => 1, // John Doe
                'otp_code' => '123456',
                'type' => 'Phone',
                'created_at' => now(),
                'expired_at' => now()->addMinutes(5),
                'is_used' => false,
            ],
            [
                'user_id' => 2, // Jane Smith
                'otp_code' => '654321',
                'type' => 'Email',
                'created_at' => now(),
                'expired_at' => now()->addMinutes(10),
                'is_used' => false,
            ],
            [
                'user_id' => 3, // Alex Johnson
                'otp_code' => '789012',
                'type' => 'Phone',
                'created_at' => now(),
                'expired_at' => now()->addMinutes(7),
                'is_used' => true,
            ],
            [
                'user_id' => 4, // Emily Davis
                'otp_code' => '345678',
                'type' => 'Email',
                'created_at' => now(),
                'expired_at' => now()->addMinutes(15),
                'is_used' => false,
            ],
            [
                'user_id' => 5, // Michael Brown
                'otp_code' => '567890',
                'type' => 'Phone',
                'created_at' => now(),
                'expired_at' => now()->addMinutes(20),
                'is_used' => false,
            ],
            [
                'user_id' => 1,
                'otp_code' => '098765',
                'type' => 'Email',
                'created_at' => now(),
                'expired_at' => now()->addMinutes(5),
                'is_used' => true,
            ],
            [
                'user_id' => 2,
                'otp_code' => '112233',
                'type' => 'Phone',
                'created_at' => now(),
                'expired_at' => now()->addMinutes(8),
                'is_used' => false,
            ],
            [
                'user_id' => 3,
                'otp_code' => '445566',
                'type' => 'Email',
                'created_at' => now(),
                'expired_at' => now()->addMinutes(12),
                'is_used' => false,
            ],
            [
                'user_id' => 4,
                'otp_code' => '778899',
                'type' => 'Phone',
                'created_at' => now(),
                'expired_at' => now()->addMinutes(10),
                'is_used' => true,
            ],
            [
                'user_id' => 5,
                'otp_code' => '223344',
                'type' => 'Email',
                'created_at' => now(),
                'expired_at' => now()->addMinutes(18),
                'is_used' => false,
            ],
            [
                'user_id' => 1,
                'otp_code' => '998877',
                'type' => 'Phone',
                'created_at' => now(),
                'expired_at' => now()->addMinutes(5),
                'is_used' => false,
            ],
            [
                'user_id' => 2,
                'otp_code' => '556677',
                'type' => 'Email',
                'created_at' => now(),
                'expired_at' => now()->addMinutes(12),
                'is_used' => true,
            ],
            [
                'user_id' => 3,
                'otp_code' => '334455',
                'type' => 'Phone',
                'created_at' => now(),
                'expired_at' => now()->addMinutes(7),
                'is_used' => false,
            ],
            [
                'user_id' => 4,
                'otp_code' => '665544',
                'type' => 'Email',
                'created_at' => now(),
                'expired_at' => now()->addMinutes(15),
                'is_used' => true,
            ],
            [
                'user_id' => 5,
                'otp_code' => '776655',
                'type' => 'Phone',
                'created_at' => now(),
                'expired_at' => now()->addMinutes(20),
                'is_used' => false,
            ],
        ]);

        Staff::insert([
            [
                'user_mobile_id' => 2, // Jane Smith
                'driver_plate' => 'B 1234 ABC',
                'driver_status' => 'Standby',
                'created_at' => now(),
                'updated_at' => now(),
                'operational_status' => false,
            ],
            [
                'user_mobile_id' => 5, // Robert Taylor
                'driver_plate' => 'B 4321 ABC',
                'driver_status' => 'Pickup',
                'created_at' => now(),
                'updated_at' => now(),
                'operational_status' => true,
            ],
            [
                'user_mobile_id' => 6, // Linda Wilson
                'driver_plate' => 'B 1234 XYZ',
                'driver_status' => 'Delivery',
                'created_at' => now(),
                'updated_at' => now(),
                'operational_status' => true,
            ],
            [
                'user_mobile_id' => 7, // William Moore
                'driver_plate' => null,
                'driver_status' => 'Offline',
                'created_at' => now(),
                'updated_at' => now(),
                'operational_status' => true,
            ],
            [
                'user_mobile_id' => 8, // Elizabeth Anderson
                'driver_plate' => null,
                'driver_status' => 'Offline',
                'created_at' => now(),
                'updated_at' => now(),
                'operational_status' => true,
            ],
        ]);

        StaffLogin::insert([
            [
                'staff_id' => 2, // Robert Taylor
                'location_type' => 'Driver',
                'location_id' => null,
                'activity_date' => now()->subDays(10),
            ],
            [
                'staff_id' => 1, // Jane Smith
                'location_type' => 'Driver',
                'location_id' => null,
                'activity_date' => now()->subDays(9),
            ],
            [
                'staff_id' => 3, // Linda Wilson
                'location_type' => 'Driver',
                'location_id' => null,
                'activity_date' => now()->subDays(8),
            ],
            [
                'staff_id' => 2, // Robert Taylor
                'location_type' => 'Driver',
                'location_id' => null,
                'activity_date' => now()->subDays(7),
            ],
            [
                'staff_id' => 1, // Jane Smith
                'location_type' => 'Driver',
                'location_id' => null,
                'activity_date' => now()->subDays(6),
            ],
            [
                'staff_id' => 3, // Linda Wilson
                'location_type' => 'Driver',
                'location_id' => null,
                'activity_date' => now()->subDays(5),
            ],
            [
                'staff_id' => 2, // Robert Taylor
                'location_type' => 'Driver',
                'location_id' => null,
                'activity_date' => now()->subDays(4),
            ],
            [
                'staff_id' => 5, // Elizabeth Anderson
                'location_type' => 'Locket',
                'location_id' => 3,
                'activity_date' => now()->subDays(4),
            ],
            [
                'staff_id' => 1, // Jane Smith
                'location_type' => 'Driver',
                'location_id' => null,
                'activity_date' => now()->subDays(3),
            ],
            [
                'staff_id' => 4, // William Moore
                'location_type' => 'HQ',
                'location_id' => 1,
                'activity_date' => now()->subDays(3),
            ],
            [
                'staff_id' => 3, // Linda Wilson
                'location_type' => 'Driver',
                'location_id' => null,
                'activity_date' => now()->subDays(2),
            ],
            [
                'staff_id' => 5, // Elizabeth Anderson
                'location_type' => 'Locket',
                'location_id' => 3,
                'activity_date' => now()->subDays(2),
            ],
            [
                'staff_id' => 2, // Robert Taylor
                'location_type' => 'Driver',
                'location_id' => null,
                'activity_date' => now()->subDays(1),
            ],
            [
                'staff_id' => 1, // Jane Smith
                'location_type' => 'Driver',
                'location_id' => null,
                'activity_date' => now()->subDays(1),
            ],
            [
                'staff_id' => 4, // William Moore
                'location_type' => 'HQ',
                'location_id' => 1,
                'activity_date' => now()->subDays(1),
            ],
            [
                'staff_id' => 1, // Jane Smith
                'location_type' => 'Driver',
                'location_id' => null,
                'activity_date' => now(),
            ],
            [
                'staff_id' => 2, // Robert Taylor
                'location_type' => 'Driver',
                'location_id' => null,
                'activity_date' => now(),
            ],
            [
                'staff_id' => 3, // Linda Wilson
                'location_type' => 'Driver',
                'location_id' => null,
                'activity_date' => now(),
            ],
            [
                'staff_id' => 4, // William Moore
                'location_type' => 'HQ',
                'location_id' => 1,
                'activity_date' => now(),
            ],
            [
                'staff_id' => 5, // Elizabeth Anderson
                'location_type' => 'Locket',
                'location_id' => 3,
                'activity_date' => now(),
            ],
        ]);

        DriverHistory::insert([
            [
                'staff_id' => 2, // Robert Taylor
                'driver_plate' => 'B 4321 ABC',
                'driver_status' => 'Pickup',
                'activity_date' => now()->subDays(10),
            ],
            [
                'staff_id' => 1, // Jane Smith
                'driver_plate' => 'B 1234 ABC',
                'driver_status' => 'Standby',
                'activity_date' => now()->subDays(9),
            ],
            [
                'staff_id' => 3, // Linda Wilson
                'driver_plate' => 'B 1234 XYZ',
                'driver_status' => 'Delivery',
                'activity_date' => now()->subDays(8),
            ],
            [
                'staff_id' => 2, // Robert Taylor
                'driver_plate' => 'B 4321 ABC',
                'driver_status' => 'Pickup',
                'activity_date' => now()->subDays(7),
            ],
            [
                'staff_id' => 1, // Jane Smith
                'driver_plate' => 'B 1234 ABC',
                'driver_status' => 'Standby',
                'activity_date' => now()->subDays(6),
            ],
            [
                'staff_id' => 3, // Linda Wilson
                'driver_plate' => 'B 1234 XYZ',
                'driver_status' => 'Delivery',
                'activity_date' => now()->subDays(5),
            ],
            [
                'staff_id' => 2, // Robert Taylor
                'driver_plate' => 'B 4321 ABC',
                'driver_status' => 'Pickup',
                'activity_date' => now()->subDays(4),
            ],
            [
                'staff_id' => 1, // Jane Smith
                'driver_plate' => 'B 1234 ABC',
                'driver_status' => 'Standby',
                'activity_date' => now()->subDays(3),
            ],
            [
                'staff_id' => 3, // Linda Wilson
                'driver_plate' => 'B 1234 XYZ',
                'driver_status' => 'Delivery',
                'activity_date' => now()->subDays(2),
            ],
            [
                'staff_id' => 2, // Robert Taylor
                'driver_plate' => 'B 4321 ABC',
                'driver_status' => 'Pickup',
                'activity_date' => now()->subDays(1),
            ],
            [
                'staff_id' => 1, // Jane Smith
                'driver_plate' => 'B 1234 ABC',
                'driver_status' => 'Standby',
                'activity_date' => now(),
            ],
        ]);

        // Mitra::insert([
        //     [
        //         'company_name' => 'Hotel Sunshine',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'company_name' => 'Apartemen Greenview',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'company_name' => 'Kos Modern',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        // ]);

        // MitraPic::insert([
        //     [
        //         'mitra_id' => 1, // Hotel Sunshine
        //         'user_web_id' => 4, // Sarah Lee
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'mitra_id' => 1, // Hotel Sunshine
        //         'user_web_id' => 5, // Daniel Kim
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'mitra_id' => 1, // Hotel Sunshine
        //         'user_web_id' => 6, // Sophia Martinez
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'mitra_id' => 1, // Hotel Sunshine
        //         'user_web_id' => null,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'mitra_id' => 2, // Apartemen Greenview
        //         'user_web_id' => 7, // James Patel
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'mitra_id' => 2, // Apartemen Greenview
        //         'user_web_id' => 8, // Olivia Nguyen
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'mitra_id' => 2, // Apartemen Greenview
        //         'user_web_id' => 9, // Liam Garcia
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'mitra_id' => 2, // Apartemen Greenview
        //         'user_web_id' => null,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'mitra_id' => 3, // Kos Modern
        //         'user_web_id' => 10, // Ava Hernandez
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'mitra_id' => 3, // Kos Modern
        //         'user_web_id' => 11, // Noah Gonzalez
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'mitra_id' => 3, // Kos Modern
        //         'user_web_id' => 1, // Alex Johnson
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'mitra_id' => 3, // Kos Modern
        //         'user_web_id' => null,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        // ]);

        // MitraPicContact::insert([
        //     [
        //         'mitra_pic_id' => 1, // Sarah Lee
        //         'name' => 'Sarah Lee',
        //         'phone_number' => '081234567891',
        //         'email' => 'sarah.lee@example.com',
        //     ],
        //     [
        //         'mitra_pic_id' => 2, // Daniel Kim
        //         'name' => 'Daniel Kim',
        //         'phone_number' => '081234567892',
        //         'email' => 'daniel.kim@example.com',
        //     ],
        //     [
        //         'mitra_pic_id' => 3, // Sophia Martinez
        //         'name' => 'Sophia Martinez',
        //         'phone_number' => '081234567893',
        //         'email' => 'sophia.martinez@example.com',
        //     ],
        //     [
        //         'mitra_pic_id' => 4, // Jessica Taylor
        //         'name' => 'Jessica Taylor',
        //         'phone_number' => '081234567890',
        //         'email' => 'jessica.taylor@example.com',
        //     ],
        //     [
        //         'mitra_pic_id' => 5, // James Patel
        //         'name' => 'James Patel',
        //         'phone_number' => '081234567894',
        //         'email' => 'james.patel@example.com',
        //     ],
        //     [
        //         'mitra_pic_id' => 6, // Olivia Nguyen
        //         'name' => 'Olivia Nguyen',
        //         'phone_number' => '081234567895',
        //         'email' => 'olivia.nguyen@example.com',
        //     ],
        //     [
        //         'mitra_pic_id' => 7, // Liam Garcia
        //         'name' => 'Liam Garcia',
        //         'phone_number' => '081234567896',
        //         'email' => 'liam.garcia@example.com',
        //     ],
        //     [
        //         'mitra_pic_id' => 8, // David Martinez
        //         'name' => 'David Martinez',
        //         'phone_number' => '081298765432',
        //         'email' => 'david.martinez@example.com',
        //     ],
        //     [
        //         'mitra_pic_id' => 9, // Ava Hernandez
        //         'name' => 'Ava Hernandez',
        //         'phone_number' => '081234567897',
        //         'email' => 'ava.hernandez@example.com',
        //     ],
        //     [
        //         'mitra_pic_id' => 10, // Noah Gonzalez
        //         'name' => 'Noah Gonzalez',
        //         'phone_number' => '081234567898',
        //         'email' => 'noah.gonzalez@example.com',
        //     ],
        //     [
        //         'mitra_pic_id' => 11, // Alex Johnson
        //         'name' => 'Alex Johnson',
        //         'phone_number' => '081234567899',
        //         'email' => 'alex.johnson@example.com',
        //     ],
        //     [
        //         'mitra_pic_id' => 12, // Kos Modern
        //         'name' => 'Emily Johnson',
        //         'phone_number' => '081233344455',
        //         'email' => 'emily.johnson@example.com',
        //     ],
        // ]);
    }
}
