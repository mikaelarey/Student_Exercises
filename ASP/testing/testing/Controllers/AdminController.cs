using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using testing.Database;
using testing.Models;
using testing.ViewModel;

namespace testing.Controllers
{
    public class AdminController : Controller
    {
        AdminDb db;

        public AdminController()
        {
            db = new AdminDb();
        }

        // GET: Admin
        public ActionResult Index()
        {
            var data = new AdminIndexViewModel()
            {
                students = db.GetStudent(),
                ErrorLog = db.GetErrors(),
                Name = "Rey Bandal"
            };

            return View(data);
        }

        [HttpGet]
        public ActionResult Forms()
        {
            ViewBag.isSuccessful = false;

            return View();
        }

        [HttpPost]
        public ActionResult GetFormData(StudentModel data)
        {
            var isSuccessful = db.InsertData(data);

            ViewBag.isSuccessful = isSuccessful;

            return View("Forms");
        }
    }
}