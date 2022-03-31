<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Faker\Factory  as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \Artisan::call('migrate:fresh');
        $faker = Faker::create();

        $roles = [
            [
                'name'=>'SUPERUSER',
            ],
        ];
        DB::table('roles')->insert($roles);
        
        $user_masters = [
            [
                'name'=>'ccsbuddy',
                'role_id'=>'1',
                'email'=>'ccsbuddy.in@gmail.com',
                'contact'=>'1234567897',
                'password'=>\Hash::make('ccsbuddy.in@gmail.com'),
                'business_logo' => 'public/user/business/1/logo/business_logo-1566365549.png',
                'business_name' => 'ccsbuddy',
            ],
        ];
        DB::table('user_masters')->insert($user_masters);
        
        $users = [
            [
                'name'=>'ccsbuddy',
                'email'=>'ccs.php.dev008@gmail.com',
                'password'=>\Hash::make('ccs.php.dev008@gmail.com'),
            ],
        ];
        DB::table('users')->insert($users);
        
        $loop = 3;
        for($i = 1; $i <= $loop; $i++){
            $categories = [
                [
                    'name'=>'Category - '.$i,
                    'remarks' => $faker->paragraph(),
                ],
            ];
            DB::table('categories')->insert($categories);

            $countries = [
                [
                    'name'=>'Country - '.$i,
                ],
            ];
            DB::table('countries')->insert($countries);

            $states = [
                [
                    'country_id'=> $i,
                    'name'=>'State - '.$i,
                ],
            ];
            DB::table('states')->insert($states);
            
            $cities = [
                [
                    'state_id'=> $i,
                    'name'=>'City - '.$i,
                ],
            ];
            DB::table('cities')->insert($cities);
            
            $products = [
                [
                    'category_id'=> $i,
                    'title'=>'Product - '.$i,
                    'keywords'=>'Product - '.$i,
                    'longitude'=>'Longitude - '.$i,
                    'latitude'=>'Latitude - '.$i,
                    'city_id'=> $i,
                    'address'=>'Address - '.$i,
                    'email'=>'Email - '.$i,
                    'phone'=>'Phone - '.$i,
                    'website'=>'Website - '.$i,
                    'yt_link'=>'yt_link - '.$i,
                    'fb_link'=>'Fb_link - '.$i,
                    'insta_link'=>'Insta_link - '.$i,
                    'wp_link'=>'Wp_link - '.$i,
                    'twitter_link'=>'Twitter_link - '.$i,
                    'linkedin_link'=>'Linkedin_link - '.$i,
                    'details'=>'details - '.$i,
                    'backgroundimage'=> 'public/media/product/background-image/1648634151.jpg'
                ],
            ];
            DB::table('products')->insert($products);

            $blogs = [
                [
                    'title'=>'Blogs - '.$i,
                    'details'=>'details - '.$i,
                ],
            ];
            DB::table('blogs')->insert($blogs);
         
            $banners = [
                [
                    'title'=>'Banners - '.$i,
                    'subtitle'=>'Subtitle - '.$i,
                ],
            ];
            DB::table('banners')->insert($banners);
         
            $how_it_works = [
                [
                    'title'=>'how_it_works - '.$i,
                    'description'=>'Descriptions - '.$i,
                ],
            ];
            DB::table('how_it_works')->insert($how_it_works);
        }

        \App\Models\CommonSettings::truncate();
        $common_settings = [
            ['field'=>'app_name', 'data'=>'Branding Point'],
            ['field'=>'text_color', 'data'=>'#000000'],
            ['field'=>'bg_color', 'data'=>'#3F51B5'],
            ['field'=>'notification_time', 'data'=>'6000'],
            ['field'=>'app_color', 'data'=>'indigo'],
            ['field'=>'app_favicon', 'data'=>'public/media/app/image/app_favicon-1129879364.ico'],
            ['field'=>'app_logo', 'data'=>'public/media/app/image/app_logo-1129879364.png'],
            ['field'=>'contact_no', 'data'=>'9825737637'],
            ['field'=>'item_slots', 'data'=>'morning,evening'],
            ['field'=>'contact_email', 'data'=>'ccsbuddy.in@gmail.com'],
            ['field'=>'mail_to_email', 'data'=>'ccsbuddy.in@gmail.com'],
            ['field'=>'about_us', 'data'=>'Recordamur concedo gravis Parvam Theophrasti appareat animi sublatum manus Accedit tertium defendit animo desiderent pellat debilitatem Brutus ponit quippiam perpauca difficilem ne earum consul quanta anteponant molestum seditione. Hominem voluptatum nostrum isti dicitur sitne inflammati erant angusti turpius Contra miraretur priventur ipsum brevis Platonis periculis praeclaram tollit sapientium tanta defuturum, Mors inbecilloque vitam totam dixeris evertunt telos. Lucilius peccandi alia honestatis Statue putanda primum ipsam sentio provocarem Democritum optinere etsi vituperatum aliquos amaret solam monstret praeter pueriliter Prorsus alios cedentem opinemur parentes necesse. Secundum artifex rebus motum hosti eximiae quisque elegantis nemore ante industriae idcirco maledicta periculis cruciantur novi vindicet Torquatus ea confidet. Mollis nacti pueriliter mandaremus legantur multos arbitramur leniter secutus hominum tranquillat beate amatoriis naturalem multi offendimur utuntur aliquam videatur voluptatum dixi: Maximam videntur contrariis umquam imperiis plus tenere est. Praesentium morbos principio defatigatio personae possumus sale quoniam modi apte duo solum agatur Itaque deterritum fortibus vias.'],
            ['field'=>'contact_us', 'data'=>'Velit defuit arbitror ConsentinisEfficit desiderant Triarius necesse turma Terentii negant via continens finxerat. Sequimur posuit praetorem ferri desperantes At inter iusteque odioque Epicurum quiete delectant ignota inermis solvantur mirari cruciantur soleat credo finiri quosdam inquit efficeret. Ficta difficile delectari quaerendum notissima temperantiam reprehensiones cohaerescant sermone maximeque probaturum illis errorem plerique efficiantur defuit indicaverunt modo invenire Torquatis impediente civitas, Accurate Aristoteli viam cui studio simulent reprehensiones convenire utroque vivendo disseretur. Existimo miserius expressas bonis ei Afranius forte Brute litteras sensu imperii suscepi nominant filium Mnesarchum cruciantur.'],
        ];
        DB::table('common_settings')->insert($common_settings);
    }
}
