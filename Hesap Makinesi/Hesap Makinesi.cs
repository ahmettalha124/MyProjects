using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace hesap_makinesi
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }
        double sayi1, sayi2;
        string hesap;
        private void rakamolay(object sender, EventArgs e)
        {
            if(textBox1.Text=="0")
            {
                textBox1.Clear();
            }
            Button btn=(Button)sender;
            textBox1.Text += btn.Text;
        }

        private void button20_Click(object sender, EventArgs e)
        {
            textBox1.Text = "0";
        }

        private void button18_Click(object sender, EventArgs e)
        {
            if (textBox1.Text.IndexOf(",") < 1) ;
            {
                textBox1.Text += ",";
            }
        }

        private void button9_Click(object sender, EventArgs e)
        {
            sayi1 = Convert.ToDouble(textBox1.Text);
            hesap = "-";
            textBox1.Text = "0";
        }

        private void button5_Click(object sender, EventArgs e)
        {
            sayi1 = Convert.ToDouble(textBox1.Text);
            hesap = "x";
            textBox1.Text = "0";
        }

        private void button3_Click(object sender, EventArgs e)
        {
            sayi1 = Convert.ToDouble(textBox1.Text);
            hesap = "/";
            textBox1.Text = "0";
        }

        private void button17_Click(object sender, EventArgs e)
        {
            sayi2=Convert.ToDouble(textBox1.Text);

            if(hesap =="+")
            {
                textBox1.Text = Convert.ToString(sayi1 + sayi2);
            }
            if (hesap == "-")
            {
                textBox1.Text = Convert.ToString(sayi1 - sayi2);
            }
            if (hesap == "/")
            {
                textBox1.Text = Convert.ToString(sayi1 / sayi2);
            }
            if (hesap == "x")
            {
                textBox1.Text = Convert.ToString(sayi1 * sayi2);
            }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            sayi1=Convert.ToDouble(textBox1.Text);
            textBox1.Text = Convert.ToString(Math.Sqrt(sayi1));
        }

        private void button1_Click(object sender, EventArgs e)
        {
            sayi1 = Convert.ToDouble(textBox1.Text);
            textBox1.Text = Convert.ToString(Math.Pow(sayi1,2));
        }

        private void button4_Click(object sender, EventArgs e)
        {
            if(Convert.ToDouble(textBox1.Text)>0)
            {
                textBox1.Text=textBox1.Text.Remove(textBox1.Text.Length -1,1);
            }
            if(textBox1.Text.Length==0)
            {
                textBox1.Text = "0";
            }
        }

        private void button13_Click(object sender, EventArgs e)
        {
            sayi1=Convert.ToDouble(textBox1.Text);
            hesap = "+";
            textBox1.Text = "0";
        }
    }
}
