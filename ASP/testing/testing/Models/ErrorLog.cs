using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace testing.Models
{
    public class ErrorLog
    {
        public int Id { get; set; }
        public string Message { get; set; }
        public string StackStrace { get; set; }
        public DateTime CretedDate { get; set; }
    }
}