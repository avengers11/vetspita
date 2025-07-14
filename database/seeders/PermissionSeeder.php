<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Carbon\Carbon;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // dashboard
            [
                'page_name' => 'Dashboard',
                'name' => 'Onwer Dashboard',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Dashboard',
                'name' => 'Doctor Dashboard',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Dashboard',
                'name' => 'Lab Technician Dashboard',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Dashboard',
                'name' => 'Receptionist Dashboard',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Dashboard',
                'name' => 'Manager Dashboard',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

            // invoice
            [
                'page_name' => 'Invoice',
                'name' => 'Invoice View',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Invoice',
                'name' => 'Invoice Add',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Invoice',
                'name' => 'Invoice Edit',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Invoice',
                'name' => 'Invoice Delete',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Invoice',
                'name' => 'Invoice Print',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Invoice',
                'name' => 'Invoice Cost',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

             // Equipment
             [
                'page_name' => 'Invoice Equipment',
                'name' => 'Invoice Equipment View',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Invoice Equipment',
                'name' => 'Invoice Equipment Add',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Invoice Equipment',
                'name' => 'Invoice Equipment Edit',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Invoice Equipment',
                'name' => 'Invoice Equipment Delete',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

            // service
            [
                'page_name' => 'Invoice Service',
                'name' => 'Invoice Service View',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Invoice Service',
                'name' => 'Invoice Service Add',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Invoice Service',
                'name' => 'Invoice Service Edit',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Invoice Service',
                'name' => 'Invoice Service Delete',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            
           // Product 
            [
                'page_name' => 'Product',
                'name' => 'Product View',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Product',
                'name' => 'Product Add',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Product',
                'name' => 'Product Edit',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Product',
                'name' => 'Product Delete',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

            // Package 
            [
                'page_name' => 'Package',
                'name' => 'Package View',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Package',
                'name' => 'Package Add',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Package',
                'name' => 'Package Edit',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Package',
                'name' => 'Package Delete',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

            // Plan 
            [
                'page_name' => 'Plan',
                'name' => 'Plan View',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Plan',
                'name' => 'Plan Add',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Plan',
                'name' => 'Plan Edit',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Plan',
                'name' => 'Plan Delete',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

            // Product Category 
            [
                'page_name' => 'Product Category',
                'name' => 'Product Category View',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Product Category',
                'name' => 'Product Category Add',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Product Category',
                'name' => 'Product Category Edit',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Product Category',
                'name' => 'Product Category Delete',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

            // Review 
            [
                'page_name' => 'Review',
                'name' => 'Review View',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Review',
                'name' => 'Review Add',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Review',
                'name' => 'Review Edit',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Review',
                'name' => 'Review Delete',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

            // service 
            [
                'page_name' => 'Service',
                'name' => 'Service View',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Service',
                'name' => 'Service Add',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Service',
                'name' => 'Service Edit',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Service',
                'name' => 'Service Delete',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

            // service Category 
            [
                'page_name' => 'Service Category',
                'name' => 'Service Category View',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Service Category',
                'name' => 'Service Category Add',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Service Category',
                'name' => 'Service Category Edit',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Service Category',
                'name' => 'Service Category Delete',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

            // Blog 
            [
                'page_name' => 'Blog',
                'name' => 'Blog View',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Blog',
                'name' => 'Blog Add',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Blog',
                'name' => 'Blog Edit',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Blog',
                'name' => 'Blog Delete',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

            // Blog Category 
            [
                'page_name' => 'Blog Category',
                'name' => 'Blog Category View',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Blog Category',
                'name' => 'Blog Category Add',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Blog Category',
                'name' => 'Blog Category Edit',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Blog Category',
                'name' => 'Blog Category Delete',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

            // Consultant 
            [
                'page_name' => 'Consultant',
                'name' => 'Consultant View',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Consultant',
                'name' => 'Consultant Add',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Consultant',
                'name' => 'Consultant Edit',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Consultant',
                'name' => 'Consultant Delete',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

            // Gallery 
            [
                'page_name' => 'Gallery',
                'name' => 'Gallery View',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Gallery',
                'name' => 'Gallery Add',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Gallery',
                'name' => 'Gallery Edit',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Gallery',
                'name' => 'Gallery Delete',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

            // Slider
            [
                'page_name' => 'Slider',
                'name' => 'Slider View',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Slider',
                'name' => 'Slider Add',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Slider',
                'name' => 'Slider Edit',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Slider',
                'name' => 'Slider Delete',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

            // Career
            [
                'page_name' => 'Career',
                'name' => 'Career View',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Career',
                'name' => 'Career Add',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Career',
                'name' => 'Career Edit',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Career',
                'name' => 'Career Delete',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

            // prescription
            [
                'page_name' => 'Prescription',
                'name' => 'Prescription View',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Prescription',
                'name' => 'Prescription Add',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Prescription',
                'name' => 'Prescription Edit',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Prescription',
                'name' => 'Prescription Delete',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

            // saved prescription
            [
                'page_name' => 'Saved Prescription',
                'name' => 'Saved Prescription View',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Saved Prescription',
                'name' => 'Saved Prescription Add',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Saved Prescription',
                'name' => 'Saved Prescription Edit',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Saved Prescription',
                'name' => 'Saved Prescription Delete',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

            // medicine
            [
                'page_name' => 'Medicine',
                'name' => 'Medicine View',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Medicine',
                'name' => 'Medicine Add',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Medicine',
                'name' => 'Medicine Edit',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Medicine',
                'name' => 'Medicine Delete',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

            // medicine category
            [
                'page_name' => 'Medicine Category',
                'name' => 'Medicine Category View',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Medicine Category',
                'name' => 'Medicine Category Add',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Medicine Category',
                'name' => 'Medicine Category Edit',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Medicine Category',
                'name' => 'Medicine Category Delete',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

            // medicine route
            [
                'page_name' => 'Medicine Route',
                'name' => 'Medicine Route View',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Medicine Route',
                'name' => 'Medicine Route Add',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Medicine Route',
                'name' => 'Medicine Route Edit',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Medicine Route',
                'name' => 'Medicine Route Delete',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

            // medicine frequency
            [
                'page_name' => 'Medicine Frequency',
                'name' => 'Medicine Frequency View',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Medicine Frequency',
                'name' => 'Medicine Frequency Add',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Medicine Frequency',
                'name' => 'Medicine Frequency Edit',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Medicine Frequency',
                'name' => 'Medicine Frequency Delete',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

            // Lap Diognosis
            [
                'page_name' => 'Lap Diognosis',
                'name' => 'Lap Diognosis View',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Lap Diognosis',
                'name' => 'Lap Diognosis Add',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Lap Diognosis',
                'name' => 'Lap Diognosis Edit',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Lap Diognosis',
                'name' => 'Lap Diognosis Delete',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

            // Lap Diognosis
            [
                'page_name' => 'Lap Diognosis Template',
                'name' => 'Lap Diognosis Template View',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Lap Diognosis Template',
                'name' => 'Lap Diognosis Template Add',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Lap Diognosis Template',
                'name' => 'Lap Diognosis Template Edit',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Lap Diognosis Template',
                'name' => 'Lap Diognosis Template Delete',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

            // Test
            [
                'page_name' => 'Test',
                'name' => 'Test View',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Test',
                'name' => 'Test Add',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Test',
                'name' => 'Test Edit',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Test',
                'name' => 'Test Delete',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

            // Client Registration
            [
                'page_name' => 'Client Registration',
                'name' => 'Client Registration',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

            // Patient
            [
                'page_name' => 'Patient',
                'name' => 'Patient View',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Patient',
                'name' => 'Patient Add',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Patient',
                'name' => 'Patient Edit',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Patient',
                'name' => 'Patient Delete',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

            // Patient Species
            [
                'page_name' => 'Patient Species',
                'name' => 'Patient Species View',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Patient Species',
                'name' => 'Patient Species Add',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Patient Species',
                'name' => 'Patient Species Edit',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Patient Species',
                'name' => 'Patient Species Delete',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

            // Parents
            [
                'page_name' => 'Parents',
                'name' => 'Parents View',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Parents',
                'name' => 'Parents Add',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Parents',
                'name' => 'Parents Edit',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Parents',
                'name' => 'Parents Delete',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

            // User Role
            [
                'page_name' => 'User Role',
                'name' => 'User Role View',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'User Role',
                'name' => 'User Role Add',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'User Role',
                'name' => 'User Role Edit',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'User Role',
                'name' => 'User Role Delete',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

            // Users
            [
                'page_name' => 'User',
                'name' => 'User View',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'User',
                'name' => 'User Add',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'User',
                'name' => 'User Edit',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'User',
                'name' => 'User Delete',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

            // general 
            [
                'page_name' => 'General',
                'name' => 'General View',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

            // Branch
            [
                'page_name' => 'Branch',
                'name' => 'Branch View',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Branch',
                'name' => 'Branch Add',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Branch',
                'name' => 'Branch Edit',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Branch',
                'name' => 'Branch Delete',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

            // Lab Task
            [
                'page_name' => 'Lab Task',
                'name' => 'Lab Task View',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Lab Task',
                'name' => 'Lab Task Status',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Lab Task',
                'name' => 'Lab Task Delete',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

            // Lab Task
            [
                'page_name' => 'Appointment',
                'name' => 'Appointment View',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Appointment',
                'name' => 'Appointment Add',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Appointment',
                'name' => 'Appointment Edit',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Appointment',
                'name' => 'Appointment Delete',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Appointment',
                'name' => 'Appointment Status',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Appointment',
                'name' => 'Appointment Authorized',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

            // User
            [
                'page_name' => 'User Access Role',
                'name' => 'User',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],

            // Order
            [
                'page_name' => 'Order',
                'name' => 'Order View',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'page_name' => 'Order',
                'name' => 'Order Status',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ]
        ];

        // permission 
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission['name']],
                [
                    'page_name' => $permission['page_name'],
                    'guard_name' => $permission['guard_name'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
    }
}
