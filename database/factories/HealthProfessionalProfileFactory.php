<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HealthProfessionalProfile>
 */
class HealthProfessionalProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=> User::factory(),

            'first_name' => function (array $attributes) {
                $nameParts = explode(' ', User::find($attributes['user_id'])->name, 2);
                return $nameParts[0];
            },

            'last_name' => function (array $attributes) {
                $nameParts = explode(' ', User::find($attributes['user_id'])->name, 2);
                return isset($nameParts[1]) ? $nameParts[1] : fake()->lastName();
            },
            'gender' => fake()->randomElement(['Male', 'Female', 'Other']),
            'about'=> fake()->randomElement([
                'Experienced psychologist specializing in cognitive behavioral therapy.',
                'Passionate mental health counselor with over 10 years of experience.',
                'Dedicated clinical psychologist focused on helping children and adolescents.',
                'Expert in forensic psychology with a background in law enforcement.',
                'Mental health professional with a specialization in neuropsychology.',
                'Experienced in providing counseling services to individuals with PTSD.',
                'Skilled in working with clients dealing with anxiety and depression.',
                'Licensed therapist with a focus on family and marriage counseling.',
                'Clinical psychologist with a background in experimental psychology.',
                'Mental health advocate with experience in health psychology.'
            ]),
            'description'=> fake()->randomElement([
                'I am a licensed clinical psychologist with over 15 years of experience in the field. I specialize in cognitive-behavioral therapy and works primarily with adults suffering from anxiety and depression.',
                'I am a passionate mental health counselor who has been providing therapy for over a decade. My expertise lies in helping clients manage stress and develop healthy coping mechanisms.',
                'I am a dedicated child psychologist focused on helping children and adolescents overcome behavioral issues. I use a variety of therapeutic techniques to support her young clients.',
                'I am an expert in forensic psychology with a unique background in law enforcement. I provide expert testimony in court cases and conducts psychological evaluations for legal purposes.',
                'I have a specialization in neuropsychology and works with patients suffering from brain injuries and neurological disorders. I use advanced diagnostic techniques to assess and treat her patients.',
                'I  have extensive experience in providing counseling services to individuals with PTSD. I employ evidence-based therapies to help his clients process trauma and improve their mental health.',
                'I am skilled in working with clients dealing with anxiety and depression. I create personalized treatment plans to help them achieve their mental health goals.',
                'I am a licensed therapist with a focus on family and marriage counseling. I work with couples and families to resolve conflicts and build stronger relationships.',
                'Dr. Green is a clinical psychologist with a background in experimental psychology. He conducts research on human behavior and applies his findings in his clinical practice.',
                'I am a mental health advocate with experience in health psychology. I work to raise awareness about mental health issues and provides support to those in need.'
            ]),
            'date_of_birth'=> fake()->date(),
            'age' => fake()->numberBetween(20, 80),
            'specialization' => fake()->randomElement(['Clinical Psychology', 'Counseling Psychology', 'School Psychology', 'Forensic Psychology', 'Industrial-Organizational Psychology', 'Health Psychology', 'Neuropsychology', 'Developmental Psychology', 'Social Psychology','Experimental Psychology', 'Congnitive Psychology', 'Environmental Psychology'],rand(3,7)),

            'hospital_affiliation' => fake()->randomElement(['St. Paul Hospital', 'Zewditu General Hospital', 'Black Lion Hospital', 'Lancet Hospital', 'Yekatit 12 Hospital', 'ICMC Hospital', 'Alert Hospital']),

            'phone_number' => fake()->phoneNumber(),
            'location' => fake()->randomElement([
            'Addis Ababa, Ethiopia',
            'Dire Dawa, Ethiopia',
            'Mekelle, Ethiopia',
            'Gondar, Ethiopia',
            'Hawassa, Ethiopia',
            'Adama, Ethiopia',
            'Jimma, Ethiopia',
            'Bahir Dar, Ethiopia',
            'Debre Markos, Ethiopia',
            'Arba Minch, Ethiopia',
            'Harar, Ethiopia',
            'Dessie, Ethiopia',
            'Shashamane, Ethiopia',
            'Sodo, Ethiopia',
            'Asella, Ethiopia',
            'Debre Birhan, Ethiopia',
            'Nekemte, Ethiopia',
            'Wolaita Sodo, Ethiopia',
            'Dilla, Ethiopia',
            'Ziway, Ethiopia',
            'New York, USA',
            'Los Angeles, USA',
            'Chicago, USA',
            'Houston, USA',
            'Phoenix, USA',
            'London, United Kingdom',
            'Manchester, United Kingdom',
            'Birmingham, United Kingdom',
            'Paris, France',
            'Marseille, France',
            'Berlin, Germany',
            'Munich, Germany',
            'Tokyo, Japan',
            'Osaka, Japan',
            'Sydney, Australia',
            'Melbourne, Australia',
            'Toronto, Canada',
            'Vancouver, Canada',
            'São Paulo, Brazil',
            'Rio de Janeiro, Brazil',
            'Buenos Aires, Argentina',
            'Córdoba, Argentina',
            'Cape Town, South Africa',
            'Johannesburg, South Africa',
            'Cairo, Egypt',
            'Alexandria, Egypt',
            'Beijing, China',
            'Shanghai, China',
            'Moscow, Russia',
            'Saint Petersburg, Russia',
            'Mumbai, India',
            'Delhi, India',
            'Istanbul, Turkey',
            'Ankara, Turkey',
            'Bangkok, Thailand',
            'Chiang Mai, Thailand',
            'Mexico City, Mexico',
            'Guadalajara, Mexico',
            'Rome, Italy',
            'Milan, Italy',
            'Seoul, South Korea',
            'Busan, South Korea',]),
            'linkedin' => fake()->url(),
            'youtube' => fake()->url(),
            'facebook' => fake()->url(),
            'instagram' => fake()->url(),
            'twitter' => fake()->url(),
            'price' => fake()->randomElement(['free', 'paid']),
            'years_of_experience' => fake()->randomElement(['0-1','2-5','5-7','7-10', '10+']),
        ];
    }
}
