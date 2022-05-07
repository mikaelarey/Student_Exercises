using System;
using System.Windows.Forms;

namespace test
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void Add_ListView_Columns()
        {
            listView1.BackColor = System.Drawing.SystemColors.Control;
            listView1.View = System.Windows.Forms.View.Details;

            ColumnHeader columnHeader1 = new ColumnHeader();
            columnHeader1.Text = "Date Time";
            columnHeader1.TextAlign = HorizontalAlignment.Left;
            columnHeader1.Width = 140;

            ColumnHeader columnHeader2 = new ColumnHeader();
            columnHeader2.Text = "Message";
            columnHeader2.TextAlign = HorizontalAlignment.Left;
            columnHeader2.Width = 440;

            listView1.Columns.Add(columnHeader1);
            listView1.Columns.Add(columnHeader2);
        }

        private void Add_Message()
        {
            var date = DateTime.Now.ToString();

            ListViewItem item = new ListViewItem(date);
            item.SubItems.Add(textBox1.Text);

            listView1.Items.Add(item);
            textBox1.Clear();
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            Add_ListView_Columns();
        }

        private void textBox1_KeyPress(object sender, KeyPressEventArgs e)
        {
            if (e.KeyChar == (char)Keys.Enter)
            {
                if (ModifierKeys == Keys.Shift)
                    return;

                Add_Message();

                e.Handled = true;
            }
        }
    }
}
