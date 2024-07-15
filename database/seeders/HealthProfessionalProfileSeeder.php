<?php

namespace Database\Seeders;

use App\Models\HealthProfessionalProfile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class HealthProfessionalProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public $descriptions;
    public $descriptionParagraph;


    public function __construct()
    {
        $this->descriptions = [
            'Responsible for diagnosing and treating various medical conditions.',
            'Provided comprehensive healthcare services for children and adolescents.',
            'Specialized in treating heart-related ailments.',
            'Diagnosed and treated skin conditions.',
            'Focused on treating neurological disorders.',
            'Performed surgeries on bones and joints.',
            'Provided mental health services including diagnosis and therapy.',
            'Specialized in imaging techniques to diagnose diseases.',
            'Focused on the treatment and care of cancer patients.',
            'Provided dental care and treatment.',
            'Assisted patients in recovery through physical therapy.',
            'Managed and dispensed medications.',
            'Provided nursing care and support to patients.',
            'Performed various types of surgical procedures.',
            'Administered anesthesia and monitored patient recovery.'
        ];
        fake()->shuffleArray($this->descriptions);
        $this->descriptionParagraph = implode(' ', fake()->randomElements($this->descriptions, fake()->numberBetween(3, 6)));
    }

    public function run(): void
    {
        //for($i=0; $i>20; $i++){
            $professional = HealthProfessionalProfile::factory()->create();
            $professional->user->addRole('health_professional');
            $tags = fake()->randomElements(['Depression','Anxiety Disorders','Substance Abuse and Addiction','Post-Traumatic Stress Disorder (PTSD)','Eating Disorders', 'Personality Disorders', 'Relationship Issues', 'Stress Management', 'Grief and Loss', 'Self-Esteem and Identity Issues'],rand(3,7));
            $nums = fake()->numberBetween(0,5);
            $range = range(1, $nums);

            foreach($tags as $tag){
                $professional->tag($tag);
            }

            foreach($range as $num){
                $start_date = fake()->dateTimeBetween('-10 years', '-1 years');
                $end_date = fake()->dateTimeBetween($start_date, 'now');
                $professional->user->experiences()->create([
                    'title' => fake()->randomElement([
                        'General Practitioner', 
                        'Pediatrician', 
                        'Cardiologist', 
                        'Dermatologist', 
                        'Neurologist', 
                        'Orthopedic Surgeon', 
                        'Psychiatrist', 
                        'Radiologist', 
                        'Oncologist', 
                        'Dentist', 
                        'Physiotherapist', 
                        'Pharmacist', 
                        'Nurse', 
                        'Surgeon', 
                        'Anesthesiologist'
                    ]),
                    'description' => $this->descriptionParagraph,
                    'company' => fake()->randomElement([
                        'General Hospital',
                        'City Clinic',
                        'Healthcare Center',
                        'Medical Group',
                        'Specialist Clinic',
                        'University Hospital',
                        'Private Practice',
                        'Regional Health Facility',
                        'Community Health Clinic',
                        'National Health Service'
                    ]),
                    'start_date' => $start_date->format('Y-m-d'),
                    'end_date' => $end_date->format('Y-m-d'),
                ]);
            }

            
       // }
    }
}
