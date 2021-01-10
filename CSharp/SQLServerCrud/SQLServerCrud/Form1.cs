using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;
using System.Data.SqlClient;

namespace SQLServerCrud
{
    public partial class Form1 : Form
    {
        //public string server = @"DESKTOP-VPUITR2\SQLEXPRESS";
        SqlConnection con = new SqlConnection(@"Data Source=DESKTOP-VPUITR2\SQLEXPRESS;Initial Catalog=Sample;Integrated Security=true;");
        SqlCommand cmd;
        SqlDataAdapter adapt;

        private int UserId;

        public Form1()
        {
            InitializeComponent();
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            // Set datagridview property to readonly to prevent from editing cells
            // and selection mode to fullrowselect to select the full row on cell click.

            dataGridView1.MultiSelect = false;  // allow 1 row only to be selected
            
            GetAllUsers();
            ClearData();

            dataGridView1.ClearSelection();     // clear the default selection on form load
        }

        private void GetAllUsers() 
        {
            try
            {
                con.Open();
                DataTable dt = new DataTable();
                adapt = new SqlDataAdapter("Select * from users", con);
                adapt.Fill(dt);
                dataGridView1.DataSource = dt;
                con.Close();
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }
        }

        private void ClearData()
        {
            txtUsername.Text = "";
            txtPassword.Text = "";
        }

        private void Add_Click(object sender, EventArgs e)
        {
            try
            {
                if (txtUsername.Text != "" && txtPassword.Text != "")
                {
                    cmd = new SqlCommand("insert into users(Username, Password) values (@username, @password)", con);
                    con.Open();

                    cmd.Parameters.AddWithValue("@username", txtUsername.Text);
                    cmd.Parameters.AddWithValue("@password", txtPassword.Text);

                    cmd.ExecuteNonQuery();
                    con.Close();

                    MessageBox.Show("Record Inserted Successfully");

                    GetAllUsers();
                    ClearData();
                }
                else
                {
                    MessageBox.Show("Please provide data for both username and password");
                }
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }
        }

        private void GetSelectedData()
        {
            foreach (DataGridViewRow row in dataGridView1.SelectedRows)
            {
                UserId = Convert.ToInt32(row.Cells[0].Value.ToString());
                txtUsername.Text = row.Cells[1].Value.ToString();
                txtPassword.Text = row.Cells[2].Value.ToString();
            }
        }

        private void Edit_Click(object sender, EventArgs e)
        {
            try
            {
                if (txtUsername.Text != "" && txtPassword.Text != "")
                {
                    cmd = new SqlCommand("update users set Username=@username, Password=@password where UserId=" + UserId, con);
                    con.Open();

                    cmd.Parameters.AddWithValue("@username", txtUsername.Text);
                    cmd.Parameters.AddWithValue("@password", txtPassword.Text);

                    cmd.ExecuteNonQuery();
                    con.Close();

                    MessageBox.Show("Record Updated Successfully");

                    GetAllUsers();
                    ClearData();
                }
                else
                {
                    MessageBox.Show("Please provide data for both username and password");
                }
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }
        }

        private void dataGridView1_SelectionChange(object sender, EventArgs e)
        {
            GetSelectedData();
        }

        private void Delete_Click(object sender, EventArgs e)
        {
            try
            {
                    cmd = new SqlCommand("delete from users where UserId=" + UserId, con);
                    con.Open();

                    cmd.Parameters.AddWithValue("@username", txtUsername.Text);
                    cmd.Parameters.AddWithValue("@password", txtPassword.Text);

                    cmd.ExecuteNonQuery();
                    con.Close();

                    MessageBox.Show("Record Deleted Successfully");

                    GetAllUsers();
                    ClearData();
                
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }
        }
    }
}
