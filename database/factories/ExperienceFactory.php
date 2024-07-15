<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experience>
 */
class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $descriptions = [
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
        fake()->shuffleArray($descriptions);
        $descriptionParagraph = implode(' ', fake()->randomElements($descriptions, fake()->numberBetween(3, 6)));
        return [
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
            'description' => $descriptionParagraph,
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
            'start_date' => fake()->date(),
            'end_date' => fake()->date(),
        ];
    }
}
