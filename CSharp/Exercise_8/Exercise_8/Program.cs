using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace Exercise_8
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.Write("Enter your name: ");
            string Name = Console.ReadLine();

            Console.Write("Enter your IDNumber: ");
            string IDNumber = Console.ReadLine();

            Console.Write("Enter your course: ");
            string Course = Console.ReadLine();

            Console.Write("Enter your year and section: ");
            string Yr_Sec = Console.ReadLine();

            Console.Write("Enter your age: ");
            int Age = Convert.ToInt32(Console.ReadLine());

            Console.Write("Enter your sex: ");
            string Sex = Console.ReadLine();

            Student student = new Student(Name, IDNumber, Course, Yr_Sec, Age, Sex);

            Console.WriteLine("\n\nSTUDENT INFORMATION\n");
            Console.WriteLine("Name: " + student.Name);
            Console.WriteLine("IDNumber: " + student.IDNumber);
            Console.WriteLine("Course: " + student.Course);
            Console.WriteLine("Year/Section: " + student.Yr_Sec);
            Console.WriteLine("Age: " + Age);
            Console.WriteLine("Sex: " + Sex);
            Console.ReadKey();
        }
    }
}
