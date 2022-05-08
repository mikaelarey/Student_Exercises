using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using testing.Models;

namespace testing.ViewModel
{
    public class AdminIndexViewModel
    {
        public List<ErrorLog> ErrorLog { get; set; }
        public List<StudentModel> students { get; set; }

        public string Name { get; set; }
    }
}