using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace Exercise_9
{
    class Employee
    {
        public string EmployeeName { get; set; }
        public string EmployeeNumber { get; set; }
        public double HoursWork { get; set; }
        public double RatePerHour { get; set; }
        public double Deduction { get; set; }

        public Employee(string EmployeeName, string EmployeeNumber, double HoursWork, double RatePerHour, double Deduction) { 
            this.EmployeeName = EmployeeName;
            this.EmployeeNumber = EmployeeNumber;
            this.HoursWork = HoursWork;
            this.RatePerHour = RatePerHour;
            this.Deduction = Deduction;
        }

        public double Gross_Salary() {
            return (this.HoursWork * this.RatePerHour);
        }

        public double Net_Salary() {
            return (this.Gross_Salary() - this.Deduction);
        }
    }
}
