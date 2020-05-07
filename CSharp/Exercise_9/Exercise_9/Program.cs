using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace Exercise_9
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.Write("Employee Name: ");
            string EmployeeName = Console.ReadLine();

            Console.Write("Employee Number: ");
            string EmployeeNumber = Console.ReadLine();

            Console.Write("Number Of Hours Work: ");
            double HoursWork = Convert.ToDouble(Console.ReadLine());

            Console.Write("Rate Per Hour: ");
            double RatePerHour = Convert.ToDouble(Console.ReadLine());

            Console.Write("Deduction: ");
            double Deduction = Convert.ToDouble(Console.ReadLine());

            Employee employee = new Employee(EmployeeName, EmployeeNumber, HoursWork, RatePerHour, Deduction);

            Console.WriteLine("\n\n");
            Console.WriteLine("Gross Salary: " + employee.Gross_Salary());
            Console.WriteLine("Net Salary: " + employee.Net_Salary());

            Console.ReadKey();
        }
    }
}
