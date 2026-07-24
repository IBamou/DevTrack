<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\User;
use App\Models\Task;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $maroua = User::where('email', 'maroua@gmail.com')->first();
        $youssef = User::where('email', 'youssef@gmail.com')->first();
        $fatima = User::where('email', 'fatima@gmail.com')->first();
        $omar = User::where('email', 'omar@gmail.com')->first();
        $salma = User::where('email', 'salma@gmail.com')->first();

        // ============================================
        // PROJECTS MAROUA CREATED (3)
        // ============================================

        // Project 1: E-commerce Website Redesign
        $p1 = Project::create([
            'title' => 'E-commerce Website Redesign',
            'prefix' => 'ECOM',
            'description' => 'Modernize the online store with a new design system, improved checkout flow, and mobile-first approach to boost conversion rates.',
            'created_by' => $maroua->id,
            'due_date' => now()->addDays(30),
        ]);
        $p1->collaborators()->attach($maroua->id, ['role' => 'admin']);
        $p1->collaborators()->attach($youssef->id, ['role' => 'member']);
        $p1->collaborators()->attach($fatima->id, ['role' => 'member']);

        // Project 2: Customer Support Portal
        $p2 = Project::create([
            'title' => 'Customer Support Portal',
            'prefix' => 'SUPP',
            'description' => 'Build a self-service support portal with knowledge base, ticket submission, and live chat integration.',
            'created_by' => $maroua->id,
            'due_date' => now()->addDays(45),
        ]);
        $p2->collaborators()->attach($maroua->id, ['role' => 'admin']);
        $p2->collaborators()->attach($omar->id, ['role' => 'member']);

        // Project 3: Internal Analytics Dashboard
        $p3 = Project::create([
            'title' => 'Internal Analytics Dashboard',
            'prefix' => 'DASH',
            'description' => 'Create a real-time analytics dashboard for tracking KPIs, user engagement, and revenue metrics across all products.',
            'created_by' => $maroua->id,
            'due_date' => now()->addDays(21),
        ]);
        $p3->collaborators()->attach($maroua->id, ['role' => 'admin']);
        $p3->collaborators()->attach($salma->id, ['role' => 'member']);
        $p3->collaborators()->attach($youssef->id, ['role' => 'member']);

        // ============================================
        // PROJECTS MAROUA WAS ADDED TO (3)
        // ============================================

        // Project 4: Mobile Banking App (Youssef's project)
        $p4 = Project::create([
            'title' => 'Mobile Banking App',
            'prefix' => 'BANK',
            'description' => 'Develop a secure mobile banking application with biometric login, fund transfers, and bill payments.',
            'created_by' => $youssef->id,
            'due_date' => now()->addDays(60),
        ]);
        $p4->collaborators()->attach($youssef->id, ['role' => 'admin']);
        $p4->collaborators()->attach($maroua->id, ['role' => 'member']);
        $p4->collaborators()->attach($fatima->id, ['role' => 'member']);

        // Project 5: HR Management System (Fatima's project)
        $p5 = Project::create([
            'title' => 'HR Management System',
            'prefix' => 'HRMS',
            'description' => 'Build an HR platform for employee onboarding, leave management, performance reviews, and payroll integration.',
            'created_by' => $fatima->id,
            'due_date' => now()->addDays(35),
        ]);
        $p5->collaborators()->attach($fatima->id, ['role' => 'admin']);
        $p5->collaborators()->attach($maroua->id, ['role' => 'member']);
        $p5->collaborators()->attach($omar->id, ['role' => 'member']);

        // Project 6: Social Media Marketing Tool (Omar's project)
        $p6 = Project::create([
            'title' => 'Social Media Marketing Tool',
            'prefix' => 'SMMT',
            'description' => 'Create a tool for scheduling posts, analyzing engagement, and managing multiple social media accounts from one dashboard.',
            'created_by' => $omar->id,
            'due_date' => now()->addDays(25),
        ]);
        $p6->collaborators()->attach($omar->id, ['role' => 'admin']);
        $p6->collaborators()->attach($maroua->id, ['role' => 'member']);
        $p6->collaborators()->attach($salma->id, ['role' => 'member']);

        // ============================================
        // REAL TASKS WITH DESCRIPTIONS
        // ============================================

        $taskNumber = 1;

        // --- Tasks for E-commerce Website Redesign ---
        Task::create([
            'title' => 'Conduct user research interviews',
            'description' => 'Schedule and conduct 8-10 user interviews to understand pain points with the current checkout process. Document findings in a research report and identify top 5 improvement areas.',
            'status' => 'done',
            'priority' => 'high',
            'due_date' => now()->subDays(12),
            'project_id' => $p1->id,
            'task_number' => $taskNumber++,
            'created_by' => $maroua->id,
            'collaborator_id' => $fatima->id,
        ]);

        Task::create([
            'title' => 'Create design system and component library',
            'description' => 'Define color palette, typography scale, spacing system, and build reusable Figma components for buttons, cards, forms, and navigation elements.',
            'status' => 'done',
            'priority' => 'high',
            'due_date' => now()->subDays(8),
            'project_id' => $p1->id,
            'task_number' => $taskNumber++,
            'created_by' => $maroua->id,
            'collaborator_id' => $youssef->id,
        ]);

        Task::create([
            'title' => 'Redesign product listing page',
            'description' => 'Implement the new product grid layout with lazy loading, filter sidebar, and sort options. Ensure responsive design works on mobile, tablet, and desktop.',
            'status' => 'in_progress',
            'priority' => 'high',
            'due_date' => now()->addDays(5),
            'project_id' => $p1->id,
            'task_number' => $taskNumber++,
            'created_by' => $maroua->id,
            'collaborator_id' => $youssef->id,
        ]);

        Task::create([
            'title' => 'Build one-page checkout flow',
            'description' => 'Replace the multi-step checkout with a single-page design. Include address autocomplete, payment method selection, and order summary with real-time total calculation.',
            'status' => 'in_progress',
            'priority' => 'high',
            'due_date' => now()->addDays(8),
            'project_id' => $p1->id,
            'task_number' => $taskNumber++,
            'created_by' => $maroua->id,
            'collaborator_id' => $maroua->id,
        ]);

        Task::create([
            'title' => 'Add product quick view modal',
            'description' => 'Implement a modal that shows product details, image gallery, size/color options, and add-to-cart button without leaving the listing page.',
            'status' => 'todo',
            'priority' => 'medium',
            'due_date' => now()->addDays(12),
            'project_id' => $p1->id,
            'task_number' => $taskNumber++,
            'created_by' => $maroua->id,
            'collaborator_id' => $fatima->id,
        ]);

        Task::create([
            'title' => 'Implement search with autocomplete',
            'description' => 'Add search bar with real-time suggestions, recent searches, and popular products. Include typo tolerance and category filtering.',
            'status' => 'todo',
            'priority' => 'medium',
            'due_date' => now()->addDays(15),
            'project_id' => $p1->id,
            'task_number' => $taskNumber++,
            'created_by' => $maroua->id,
            'collaborator_id' => $youssef->id,
        ]);

        Task::create([
            'title' => 'Optimize images and implement CDN',
            'description' => 'Convert all product images to WebP format, implement responsive images with srcset, and configure Cloudflare CDN for global edge caching.',
            'status' => 'review',
            'priority' => 'medium',
            'due_date' => now()->addDays(3),
            'project_id' => $p1->id,
            'task_number' => $taskNumber++,
            'created_by' => $maroua->id,
            'collaborator_id' => $fatima->id,
        ]);

        Task::create([
            'title' => 'Set up A/B testing framework',
            'description' => 'Integrate Google Optimize for running A/B tests on checkout flow, product page layouts, and CTA button designs. Configure conversion tracking.',
            'status' => 'todo',
            'priority' => 'low',
            'due_date' => now()->addDays(20),
            'project_id' => $p1->id,
            'task_number' => $taskNumber++,
            'created_by' => $maroua->id,
            'collaborator_id' => $maroua->id,
        ]);

        // --- Tasks for Customer Support Portal ---
        Task::create([
            'title' => 'Design knowledge base structure',
            'description' => 'Plan the information architecture for the help center. Create categories for billing, account, technical issues, and getting started. Define article templates.',
            'status' => 'done',
            'priority' => 'high',
            'due_date' => now()->subDays(10),
            'project_id' => $p2->id,
            'task_number' => $taskNumber++,
            'created_by' => $maroua->id,
            'collaborator_id' => $omar->id,
        ]);

        Task::create([
            'title' => 'Build ticket submission form',
            'description' => 'Create a multi-step form for submitting support tickets with category selection, priority level, file attachments, and automatic department routing.',
            'status' => 'done',
            'priority' => 'high',
            'due_date' => now()->subDays(5),
            'project_id' => $p2->id,
            'task_number' => $taskNumber++,
            'created_by' => $maroua->id,
            'collaborator_id' => $omar->id,
        ]);

        Task::create([
            'title' => 'Implement live chat widget',
            'description' => 'Integrate Intercom live chat widget with custom styling. Set up automated greetings, working hours detection, and offline message collection.',
            'status' => 'in_progress',
            'priority' => 'high',
            'due_date' => now()->addDays(4),
            'project_id' => $p2->id,
            'task_number' => $taskNumber++,
            'created_by' => $maroua->id,
            'collaborator_id' => $omar->id,
        ]);

        Task::create([
            'title' => 'Create FAQ page with search',
            'description' => 'Build a searchable FAQ page with expandable accordion sections, helpful voting system, and links to related articles.',
            'status' => 'todo',
            'priority' => 'medium',
            'due_date' => now()->addDays(10),
            'project_id' => $p2->id,
            'task_number' => $taskNumber++,
            'created_by' => $maroua->id,
            'collaborator_id' => $maroua->id,
        ]);

        Task::create([
            'title' => 'Build ticket status tracking page',
            'description' => 'Create a user dashboard showing all submitted tickets with real-time status updates, response history, and estimated resolution time.',
            'status' => 'todo',
            'priority' => 'medium',
            'due_date' => now()->addDays(14),
            'project_id' => $p2->id,
            'task_number' => $taskNumber++,
            'created_by' => $maroua->id,
            'collaborator_id' => $omar->id,
        ]);

        // --- Tasks for Internal Analytics Dashboard ---
        Task::create([
            'title' => 'Define KPI metrics and data sources',
            'description' => 'Meet with stakeholders to identify key metrics: daily active users, revenue per user, churn rate, and feature adoption. Map data sources and update frequency.',
            'status' => 'done',
            'priority' => 'high',
            'due_date' => now()->subDays(7),
            'project_id' => $p3->id,
            'task_number' => $taskNumber++,
            'created_by' => $maroua->id,
            'collaborator_id' => $salma->id,
        ]);

        Task::create([
            'title' => 'Design dashboard wireframes',
            'description' => 'Create low-fidelity wireframes for the main dashboard, revenue analytics, user growth, and feature usage views. Include mobile responsive layouts.',
            'status' => 'done',
            'priority' => 'high',
            'due_date' => now()->subDays(3),
            'project_id' => $p3->id,
            'task_number' => $taskNumber++,
            'created_by' => $maroua->id,
            'collaborator_id' => $youssef->id,
        ]);

        Task::create([
            'title' => 'Build real-time revenue chart',
            'description' => 'Implement an interactive line chart showing daily revenue with date range selector, comparison periods, and export to CSV functionality.',
            'status' => 'in_progress',
            'priority' => 'high',
            'due_date' => now()->addDays(3),
            'project_id' => $p3->id,
            'task_number' => $taskNumber++,
            'created_by' => $maroua->id,
            'collaborator_id' => $youssef->id,
        ]);

        Task::create([
            'title' => 'Create user acquisition funnel',
            'description' => 'Build a funnel visualization showing visitor → signup → activation → retention stages. Include conversion rates between each step and drop-off analysis.',
            'status' => 'in_progress',
            'priority' => 'medium',
            'due_date' => now()->addDays(6),
            'project_id' => $p3->id,
            'task_number' => $taskNumber++,
            'created_by' => $maroua->id,
            'collaborator_id' => $salma->id,
        ]);

        Task::create([
            'title' => 'Add date range and filter controls',
            'description' => 'Implement global date range picker with presets (today, last 7 days, last 30 days, this month, custom). Add filters for country, device, and traffic source.',
            'status' => 'todo',
            'priority' => 'medium',
            'due_date' => now()->addDays(10),
            'project_id' => $p3->id,
            'task_number' => $taskNumber++,
            'created_by' => $maroua->id,
            'collaborator_id' => $maroua->id,
        ]);

        // --- Tasks for Mobile Banking App ---
        Task::create([
            'title' => 'Set up biometric authentication',
            'description' => 'Implement Face ID and fingerprint authentication using the device biometric APIs. Add fallback to PIN code and secure keychain storage for credentials.',
            'status' => 'done',
            'priority' => 'high',
            'due_date' => now()->subDays(15),
            'project_id' => $p4->id,
            'task_number' => $taskNumber++,
            'created_by' => $youssef->id,
            'collaborator_id' => $maroua->id,
        ]);

        Task::create([
            'title' => 'Build fund transfer flow',
            'description' => 'Create the money transfer screen with contact selection, amount input, recipient confirmation, and transaction receipt. Support both internal and external transfers.',
            'status' => 'in_progress',
            'priority' => 'high',
            'due_date' => now()->addDays(7),
            'project_id' => $p4->id,
            'task_number' => $taskNumber++,
            'created_by' => $youssef->id,
            'collaborator_id' => $fatima->id,
        ]);

        Task::create([
            'title' => 'Implement bill payment module',
            'description' => 'Allow users to pay utility bills (electricity, water, internet) by scanning barcode or entering account number. Save favorite billers for quick access.',
            'status' => 'todo',
            'priority' => 'medium',
            'due_date' => now()->addDays(14),
            'project_id' => $p4->id,
            'task_number' => $taskNumber++,
            'created_by' => $youssef->id,
            'collaborator_id' => $maroua->id,
        ]);

        Task::create([
            'title' => 'Add transaction history with filters',
            'description' => 'Display complete transaction history with search, date range filter, category tags, and ability to export as PDF or CSV statement.',
            'status' => 'todo',
            'priority' => 'medium',
            'due_date' => now()->addDays(18),
            'project_id' => $p4->id,
            'task_number' => $taskNumber++,
            'created_by' => $youssef->id,
            'collaborator_id' => $fatima->id,
        ]);

        // --- Tasks for HR Management System ---
        Task::create([
            'title' => 'Design employee onboarding workflow',
            'description' => 'Map the complete onboarding process from offer acceptance to first week. Create digital checklist, document upload, and welcome email sequence.',
            'status' => 'done',
            'priority' => 'high',
            'due_date' => now()->subDays(8),
            'project_id' => $p5->id,
            'task_number' => $taskNumber++,
            'created_by' => $fatima->id,
            'collaborator_id' => $maroua->id,
        ]);

        Task::create([
            'title' => 'Build leave request system',
            'description' => 'Create leave request form with calendar date picker, automatic manager approval routing, balance tracking, and holiday calendar integration.',
            'status' => 'in_progress',
            'priority' => 'high',
            'due_date' => now()->addDays(5),
            'project_id' => $p5->id,
            'task_number' => $taskNumber++,
            'created_by' => $fatima->id,
            'collaborator_id' => $omar->id,
        ]);

        Task::create([
            'title' => 'Implement performance review forms',
            'description' => 'Build 360-degree review forms with self-assessment, peer feedback, and manager evaluation sections. Include goal tracking and rating scales.',
            'status' => 'todo',
            'priority' => 'medium',
            'due_date' => now()->addDays(12),
            'project_id' => $p5->id,
            'task_number' => $taskNumber++,
            'created_by' => $fatima->id,
            'collaborator_id' => $maroua->id,
        ]);

        Task::create([
            'title' => 'Create employee directory',
            'description' => 'Build searchable employee directory with profile photos, department, position, contact info, and org chart visualization.',
            'status' => 'review',
            'priority' => 'medium',
            'due_date' => now()->addDays(2),
            'project_id' => $p5->id,
            'task_number' => $taskNumber++,
            'created_by' => $fatima->id,
            'collaborator_id' => $omar->id,
        ]);

        // --- Tasks for Social Media Marketing Tool ---
        Task::create([
            'title' => 'Build post scheduler interface',
            'description' => 'Create a calendar view for scheduling posts across Instagram, Twitter, Facebook, and LinkedIn. Support drag-and-drop rescheduling and bulk upload.',
            'status' => 'done',
            'priority' => 'high',
            'due_date' => now()->subDays(6),
            'project_id' => $p6->id,
            'task_number' => $taskNumber++,
            'created_by' => $omar->id,
            'collaborator_id' => $salma->id,
        ]);

        Task::create([
            'title' => 'Integrate social media APIs',
            'description' => 'Connect to Instagram Graph API, Twitter API v2, Facebook Graph API, and LinkedIn Marketing API for posting, analytics, and account management.',
            'status' => 'in_progress',
            'priority' => 'high',
            'due_date' => now()->addDays(6),
            'project_id' => $p6->id,
            'task_number' => $taskNumber++,
            'created_by' => $omar->id,
            'collaborator_id' => $maroua->id,
        ]);

        Task::create([
            'title' => 'Create engagement analytics dashboard',
            'description' => 'Build charts showing likes, comments, shares, reach, and follower growth over time. Include per-platform breakdown and best posting times analysis.',
            'status' => 'todo',
            'priority' => 'medium',
            'due_date' => now()->addDays(12),
            'project_id' => $p6->id,
            'task_number' => $taskNumber++,
            'created_by' => $omar->id,
            'collaborator_id' => $salma->id,
        ]);

        Task::create([
            'title' => 'Add content library feature',
            'description' => 'Create a media library for storing images, videos, and captions. Support tagging, folders, and quick insertion into the post composer.',
            'status' => 'todo',
            'priority' => 'low',
            'due_date' => now()->addDays(18),
            'project_id' => $p6->id,
            'task_number' => $taskNumber++,
            'created_by' => $omar->id,
            'collaborator_id' => $maroua->id,
        ]);
    }
}
