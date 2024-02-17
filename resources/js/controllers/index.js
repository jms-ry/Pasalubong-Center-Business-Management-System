// This file is auto-generated by `php artisan stimulus:install`
// Run that command whenever you add a new controller or create them with
// `php artisan stimulus:make controllerName`

import { application } from '../libs/stimulus'


import CustomerController from './customer_controller'
application.register('customer', CustomerController)

import EmployeeController from './employee_controller'
application.register('employee', EmployeeController)

import HelloController from './hello_controller'
application.register('hello', HelloController)