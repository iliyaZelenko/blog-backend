<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;
use App\Traits\Avatar;

class UsersTableSeeder extends Seeder
{
    use Avatar;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 5;
        $savedCount = User::count();

        if ($savedCount < $count) {
//            factory(User::class, $count - $savedCount)->create();

            factory(User::class, $count - $savedCount)->create()->each(function ($u) {
                $avatar = ($u->gender ? 'https://randomuser.me/api/portraits/men/' : 'https://randomuser.me/api/portraits/women/') . random_int(0, 99) . '.jpg';
                $this->setAvatar($u, $avatar);
            });
        }

//        if (!User::where('name', 'Vladimir Putin')->first()) {
//            factory(User::class)->create([
//                'name' => 'Vladimir Putin',
//                'email' => 'test@test.com',
//                'password' => Hash::make('password')
//            ]);
//        }

        $adminNickname = 'Ilya-Zelenko';

        if (!User::ofNickname($adminNickname)->first()) {
            $this->makeAdmin($adminNickname);
        }
    }

    public function makeAdmin($adminNickname) {
        $adminAvatarBasePath = public_path('avatars/forAdminSeed/');
        $admin = User::firstOrCreate([
            'nickname' => $adminNickname,
            'email' => 'test@test.com',
            'first_name' => 'Илья',
            'last_name' => 'Зеленько',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'gender' => true,
            'birthday' => Carbon::now()->subYears(18)
            // 'avatar' => [
            //     "lg" => $adminAvatarBasePath . 'lg.jpg',
            //     "md" => $adminAvatarBasePath . 'md.jpg',
            //     "sm" => $adminAvatarBasePath . 'sm.jpg',
            //     "circle" => $adminAvatarBasePath . 'circle.jpg',
            // ],
        ]);

        $this->setAvatar($admin, $adminAvatarBasePath . 'lg.jpg');
    }

    public function setAvatar($user, $url) {
        $img = \Image::make($url);
        $this->setUserAvatar($user, $img);
    }
}

