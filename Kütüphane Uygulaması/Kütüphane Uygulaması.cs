using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace WindowsFormsApp16
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
            KategorileriBaslat();
            YayınEvleriBaslat();
            DataGridViewBaslat();
        }
        //soru 1
        private void button1_Click(object sender, EventArgs e)
        {
            //x, y ve z değerlerini atıyoruz
            double x = Convert.ToDouble(textBox1.Text);
            double y = Convert.ToDouble(textBox2.Text);
            double z = Convert.ToDouble(textBox3.Text);
            //denkleme göre kodlamasını yapıyoruz
            double sonuc = Math.Sqrt(x) + (y / (x * x * x) + (x * y * z));
            // sonucu listboxa yazdırıyoruz
            listBox1.Items.Add(sonuc);
        }
        private void button2_Click(object sender, EventArgs e)
        {
            // 10 elemanlı bir tamsayı dizisi tanımlanıyor
            int[] sayılar = new int[10];

            // Rastgele sayı üretmek için Random sınıfından bir nesne oluşturuluyor
            Random rnd = new Random();

            // textBox4'ü temizliyor
            textBox4.Clear();

            // listBox2'yi temizliyor
            listBox2.Items.Clear();

            // 10 defa döngüye girerek rastgele sayılar üretiyor
            for (int i = 0; i < 10; i++)
            {
                // 1 ile 100 arasında rastgele bir sayı üretiyor
                int rastgeleSayı = rnd.Next(1, 101);

                // Üretilen rastgele sayıyı diziye ekliyor
                sayılar[i] = rastgeleSayı;

                // Üretilen rastgele sayıyı textBox4'e ekliyor
                textBox4.Text += rastgeleSayı.ToString() + Environment.NewLine;

                // Üretilen rastgele sayıyı listBox2'ye ekliyor
                listBox2.Items.Add(rastgeleSayı);
            }

            // Dizideki her sayı için Smith sayısı olup olmadığını kontrol ediyor
            foreach (int sayı in sayılar)
            {
                if (SmithSayısıMı(sayı))
                {
                    // Eğer sayı bir Smith sayısıysa mesaj kutusunda gösteriyor
                    MessageBox.Show(sayı + " bir Smith Sayısıdır.");
                }
                else
                {
                    // Eğer sayı bir Smith sayısı değilse mesaj kutusunda gösteriyor
                    MessageBox.Show(sayı + " bir Smith Sayısı Değildir.");
                }
            }
        }

        private bool SmithSayısıMı(int sayı)
        {
            // Sayının rakamlarının toplamını hesaplıyor
            int rakamlarınToplamı = sayı.ToString().Sum(c => c - '0');

            // Sayının bir kopyasını alıyor
            int sayıKopya = sayı;

            // Bölen olarak 2'den başlıyor
            int bölen = 2;

            // Sayının tüm bölenlerini kontrol eden döngü
            while (sayıKopya > 1)
            {
                if (sayıKopya % bölen == 0)
                {
                    // Eğer sayı bölenle tam bölünüyorsa, bölenin rakamlarının toplamını hesaplıyor
                    int bölenToplam = bölen.ToString().Sum(c => c - '0');

                    // Rakamların toplamından bölenin rakamlarının toplamını çıkarıyor
                    rakamlarınToplamı -= bölenToplam;

                    // Sayıyı bölen ile bölüyor
                    sayıKopya /= bölen;
                }
                else
                {
                    // Eğer sayı bölenle tam bölünmüyorsa, böleni bir artırıyor
                    bölen++;
                }
            }

            // Eğer rakamların toplamı sıfıra eşitse sayı bir Smith sayısıdır
            return rakamlarınToplamı == 0;
        }

        
        public struct Kitap
        {
            public string Kitapadi;     
            public string Kitapkodu;    
            public string Yazaradi;   
            public string Kategori;     
            public string Yayınevi;     
            public DateTime Basimtarihi;
        }

        // Kitapları tutacak bir liste oluşturuyor
        private List<Kitap> kitaplar = new List<Kitap>();
        private void KategorileriBaslat()
        {
            // Kategorileri içeren bir dizi oluşturuyor
            string[] kategoriler =
            {
        "Askeri Bilimler", "Astronomi ve Uzay", "Bilgisayar","Çevre Bilimleri","Dil ve Edebiyat","Eğitim","Ekonomi ve Finans","Enerji ","Felsefe,Psikoloji ve Din","Fizik","Genel Çalışmalar ","Güzel Sanatlar" ,"Hukuk" ,"İşletme ve Yönetim ","Kimya ","Kütüphanecilik ","Matematik ve İstatislik ","Medya ve İletişim ","Mimarlık ve Tasarım" ,"Mühendislik ve Teklonoji" ,"Müze ve Kültürel Çalışmalar" ,"Müzik" ,"Politika ve Uluslar Arası İlişkiler" ,"Sosyoloji" ,"Spor, Seyehat ve Turizm" ,"Tarih" ,"Tarım ve Biyoloji" ,"Tıp"
    };

            // Kategorileri comboBox1'e ekliyor
            comboBox1.Items.AddRange(kategoriler);
        }

      
        private void YayınEvleriBaslat()
        {
            // Yayınevlerini içeren bir dizi oluşturuyor
            string[] yayınevleri =
            {
        "Pegasus Yayınları", "Yedi Kalem Yayınları" ,"Profil Kitap" ,"Mavi Ağaç Yayınları ","Meydan Yayınları","Timaş Yayınları ","Ekol Yayınları ","Savaş Yayınları ","Hayat Yayınları" ,"NG Yayıncılık ","Nasihat Yayınları ","Yedi Tepe Yayınları ","Ataç Yayınları","Dedelus Yayınları","Doğu Batı Yayınları","Server Yayınları", "İnsan Yayınları",
    };

            // Yayınevlerini comboBox2'ye ekliyor
            comboBox2.Items.AddRange(yayınevleri);
        }     
        private void DataGridViewBaslat()
        {
            // DataGridView'in sütun sayısını ayarlıyor
            dataGridView1.ColumnCount = 6;

            // Sütunların adlarını ayarlıyor
            dataGridView1.Columns[0].Name = "Kitap Adı";
            dataGridView1.Columns[1].Name = "Kitap Kodu";
            dataGridView1.Columns[2].Name = "Yazar Adı";
            dataGridView1.Columns[3].Name = "Kategoriler";
            dataGridView1.Columns[4].Name = "Yayın Evi";
            dataGridView1.Columns[5].Name = "Basım Tarihi";
        }
        private void button3_Click(object sender, EventArgs e)
        {
            // Yeni bir kitap nesnesi oluşturuyor ve kullanıcıdan aldığı bilgileri dolduruyor
            Kitap yenikitap = new Kitap()
            {
                Kitapadi = textBox5.Text,
                Kitapkodu = textBox6.Text,
                Yazaradi = textBox7.Text,
                Kategori = comboBox1.SelectedItem.ToString(),
                Yayınevi = comboBox2.SelectedItem.ToString(),
                Basimtarihi = dateTimePicker1.Value
            };

            // Yeni kitabı kitaplar listesine ekliyor
            kitaplar.Add(yenikitap);

            // Yeni kitabı DataGridView'e ekliyor
            KitapGrideEkle(yenikitap);
        }
        private void button4_Click(object sender, EventArgs e)
        {
            // Seçili satırları silen döngü
            foreach (DataGridViewRow row in dataGridView1.SelectedRows)
            {
                dataGridView1.Rows.Remove(row);
            }
        }
        private void button5_Click(object sender, EventArgs e)
        {
            // Seçili satırları güncelleyen döngü
            foreach (DataGridViewRow row in dataGridView1.SelectedRows)
            {
                row.Cells[0].Value = textBox5.Text;
                row.Cells[1].Value = textBox6.Text;
                row.Cells[2].Value = textBox7.Text;
                row.Cells[3].Value = comboBox1.SelectedItem.ToString();
                row.Cells[4].Value = comboBox2.SelectedItem.ToString();
                row.Cells[5].Value = dateTimePicker1.Value.ToShortDateString();
            }
        }
        private void KitapGrideEkle(Kitap kitap)
        {
            // Kitap bilgilerini bir diziye alıyor
            string[] satir =
            {
        kitap.Kitapadi, kitap.Kitapkodu, kitap.Yazaradi, kitap.Kategori,
        kitap.Yayınevi, kitap.Basimtarihi.ToShortDateString()
    };

            // Satırı DataGridView'e ekliyor
            dataGridView1.Rows.Add(satir);
        }
    }
}