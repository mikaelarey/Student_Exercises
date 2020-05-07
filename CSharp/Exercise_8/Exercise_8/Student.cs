using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace Exercise_8
{
    class Student
    {
        public string Name { get; set; }
        public string IDNumber { get; set; }
        public string Course { get; set; }
        public string Yr_Sec { get; set; }
        public int Age { get; set; }
        public string Sex { get; set; }

        public Student(string Name, string IDNumber, string Course, string Yr_Sec, int Age, string Sex) {
            this.Name = Name;
            this.IDNumber = IDNumber;
            this.Course = Course;
            this.Yr_Sec = Yr_Sec;
            this.Age = Age;
            this.Sex = Sex;
        }
    }
}
