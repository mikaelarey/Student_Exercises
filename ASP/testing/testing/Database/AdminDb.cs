using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using testing.Models;
using System.Data.SqlClient;
using System.Configuration;
using System.Data;

namespace testing.Database
{
    public class AdminDb
    {
        private readonly string ConnectionString = ConfigurationManager.ConnectionStrings["sqlconnection"].ConnectionString;

        public List<StudentModel> GetStudent()
        {
            var data = new DataTable();

            using (var con = new SqlConnection(ConnectionString))
            {
                con.Open();

                using (var cmd = new SqlCommand())
                {
                    cmd.Connection = con;

                    cmd.CommandText = @"SELECT TOP (1000) [Id]
                                        ,[FirstName]
                                        ,[LastName]
                                        ,[UserAccountId]
                                        FROM[CVSU].[dbo].[UserInformation]";

                    var adapter = new SqlDataAdapter();
                    adapter.SelectCommand = cmd;

                    adapter.Fill(data);
                }
            }

            var list = new List<StudentModel>();

            foreach (DataRow item in data.Rows)
            {
                var student = new StudentModel()
                {
                    Id = Convert.ToInt32(item["Id"].ToString()),
                    FirstName = item["FirstName"].ToString(),
                    LastName = item["LastName"].ToString(),
                    UserAccountId = Convert.ToInt32(item["UserAccountId"].ToString())
                };

                list.Add(student);
            }

            return list;
        }

        public List<ErrorLog> GetErrors()
        {
            var data = new DataTable();

            using (var con = new SqlConnection(ConnectionString))
            {
                con.Open();

                using (var cmd = new SqlCommand())
                {
                    cmd.Connection = con;

                    cmd.CommandText = "GetErrors";
                    cmd.CommandType = CommandType.StoredProcedure;

                    var adapter = new SqlDataAdapter();
                    adapter.SelectCommand = cmd;

                    adapter.Fill(data);
                }
            }

            var list = new List<ErrorLog>();

            foreach (DataRow item in data.Rows)
            {
                var student = new ErrorLog()
                {
                    Id = Convert.ToInt32(item["Id"].ToString()),
                    Message = item["Message"].ToString(),
                    StackStrace = item["StackTrace"].ToString(),
                    CretedDate = Convert.ToDateTime(item["Created"].ToString())
                };

                list.Add(student);
            }

            return list;
        }

        public bool InsertData(StudentModel data)
        {
            using (var con = new SqlConnection(ConnectionString))
            {
                con.Open();

                using (var cmd = new SqlCommand())
                {
                    cmd.Connection = con;
                    cmd.CommandText = "InsertUser";
                    cmd.CommandType = CommandType.StoredProcedure;

                    cmd.Parameters.AddWithValue("@FirstName", data.FirstName);
                    cmd.Parameters.AddWithValue("@LastName", data.LastName);

                    return cmd.ExecuteNonQuery() > 0;
                }
            }
        }
    }
}