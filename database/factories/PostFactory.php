<?php

namespace Database\Factories;

use App\Models\HealthProfessionalProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'health_professional_profile_id' => HealthProfessionalProfile::factory(),
            'image' => 'http://picsum.photos/seed/'.rand(1, 100000).'/1000/1000',
            'title' => fake()->randomElement([
                'Understanding Depression: Causes and Treatment',
                'Overcoming Alcoholism: Steps to Recovery',
                'The Impact of Drug Addiction on Mental Health',
                'Coping with Anxiety and Stress',
                'Breaking the Stigma: Mental Health Awareness',
                'Effective Strategies for Managing Depression',
                'Support Systems for Alcohol Addiction Recovery',
                'Mental Health and Substance Abuse: A Dual Diagnosis',
                'Recognizing the Signs of Depression',
                'How to Support a Loved One with Addiction'
            ]),
            'description' => fake()->randomElement([
                'Depression is a complex mental health condition that affects millions of people worldwide. Understanding its causes and finding effective treatments is essential for recovery. This article delves into the various factors contributing to depression and explores different therapeutic approaches.',
                'Alcoholism can have devastating effects on both physical and mental health. Overcoming this addiction requires a comprehensive approach that includes medical treatment, counseling, and support groups. Learn about the steps to recovery and how to maintain sobriety in this informative post.',
                'Drug addiction often leads to severe mental health issues, including anxiety, depression, and psychosis. This article examines the relationship between drug abuse and mental health, highlighting the importance of addressing both issues simultaneously for successful recovery.',
                'Anxiety and stress are common mental health challenges that can significantly impact daily life. Discover effective coping strategies and techniques to manage these conditions, from mindfulness practices to professional therapy, in this detailed guide.',
                'Mental health awareness is crucial in breaking the stigma surrounding mental illnesses. This post discusses the importance of open conversations about mental health, ways to promote awareness, and the benefits of seeking help without fear of judgment.',
                'Managing depression involves a combination of medical treatment, lifestyle changes, and psychological support. This article offers practical strategies for dealing with depression, including tips on medication, therapy, exercise, and building a strong support network.',
                'Recovery from alcohol addiction is a challenging journey that requires support from various sources. Explore the different types of support systems available, including rehabilitation centers, therapy options, and community support groups, in this comprehensive post.',
                'Substance abuse and mental health disorders often occur together, complicating the treatment process. This post provides insights into dual diagnosis, the challenges it presents, and effective treatment approaches to address both issues simultaneously.',
                'Recognizing the signs of depression early can lead to timely intervention and better outcomes. Learn about the common symptoms of depression, how to identify them in yourself or others, and the importance of seeking professional help in this informative article.',
                'Supporting a loved one with addiction can be challenging and emotionally draining. This post offers practical advice on how to provide effective support, including tips on communication, setting boundaries, and encouraging professional treatment.'
            ]),
            'duration' => fake()->randomElement([
                '10 - Minutes', '15 - Minutes', '5 - Minutes',
            ])
        ];
    }
}
