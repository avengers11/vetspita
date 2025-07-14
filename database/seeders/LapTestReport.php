<?php

namespace Database\Seeders;

use App\Models\LabTestPrescription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LapTestReport extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lap_cbc = new LabTestPrescription();
        $lap_cbc->prescription_name = "CBC";
        $lap_cbc->prescription_content = '<table class="cbc" style="border-collapse: collapse; width: 100%;">
<thead>
<tr>
<th style="text-align: start; padding-bottom: 5px;">Parameter</th>
<th style="text-align: start; padding-bottom: 5px;">Result</th>
<th style="text-align: start; padding-bottom: 5px;">Ref. Value</th>
<th style="text-align: start; padding-bottom: 5px;">Unit</th>
<th style="text-align: start; padding-bottom: 5px;">Status</th>
<th style="text-align: start; padding-bottom: 5px;">Status Bar</th>
</tr>
</thead>
<tbody>
<tr>
<td>WBC</td>
<td>17.49</td>
<td>N</td>
<td>5.50 - 19.50</td>
<td>10&sup3;/uL</td>
<td style="text-align: end; width: 20%;">
<div class="range-wrapper" style="display: flex;"><input id="" class="tinyMC_range" name="" type="range"> <span class="bar1">|</span> <span class="bar2">|</span></div>
</td>
</tr>
<tr>
<td>NEU</td>
<td>16.00</td>
<td>H</td>
<td>3.12 - 12.58</td>
<td>10&sup3;/uL</td>
<td style="text-align: end; width: 20%;">
<div class="range-wrapper" style="display: flex;"><input id="" class="tinyMC_range" name="" type="range"> <span class="bar1">|</span> <span class="bar2">|</span></div>
</td>
</tr>
<tr>
<td>LYM</td>
<td>0.80</td>
<td>L</td>
<td>0.73 - 7.86</td>
<td>10&sup3;/uL</td>
<td style="text-align: end; width: 20%;">
<div class="range-wrapper" style="display: flex;"><input id="" class="tinyMC_range" name="" type="range"> <span class="bar1">|</span> <span class="bar2">|</span></div>
</td>
</tr>
<tr>
<td>MONO</td>
<td>0.59</td>
<td>N</td>
<td>0.07 - 1.36</td>
<td>10&sup3;/uL</td>
<td style="text-align: end; width: 20%;">
<div class="range-wrapper" style="display: flex;"><input id="" class="tinyMC_range" name="" type="range"> <span class="bar1">|</span> <span class="bar2">|</span></div>
</td>
</tr>
<tr>
<td>EOS</td>
<td>0.10</td>
<td>N</td>
<td>0.01 - 1.93</td>
<td>10&sup3;/uL</td>
<td style="text-align: end; width: 20%;">
<div class="range-wrapper" style="display: flex;"><input id="" class="tinyMC_range" name="" type="range"> <span class="bar1">|</span> <span class="bar2">|</span></div>
</td>
</tr>
<tr>
<td>BAS</td>
<td>0.00</td>
<td>N</td>
<td>0.00 - 0.12</td>
<td>10&sup3;/uL</td>
<td style="text-align: end; width: 20%;">
<div class="range-wrapper" style="display: flex;"><input id="" class="tinyMC_range" name="" type="range"> <span class="bar1">|</span> <span class="bar2">|</span></div>
</td>
</tr>
<tr>
<td>NEU %</td>
<td>91.5</td>
<td>H</td>
<td>38.0 - 80.0</td>
<td>%</td>
<td style="text-align: end; width: 20%;">
<div class="range-wrapper" style="display: flex;"><input id="" class="tinyMC_range" name="" type="range"> <span class="bar1">|</span> <span class="bar2">|</span></div>
</td>
</tr>
<tr>
<td>LYM %</td>
<td>4.6</td>
<td>L</td>
<td>12.0 - 45.0</td>
<td>%</td>
<td style="text-align: end; width: 20%;">
<div class="range-wrapper" style="display: flex;"><input id="" class="tinyMC_range" name="" type="range"> <span class="bar1">|</span> <span class="bar2">|</span></div>
</td>
</tr>
<tr>
<td>MONO %</td>
<td>3.3</td>
<td>N</td>
<td>1.0 - 8.0</td>
<td>%</td>
<td style="text-align: end; width: 20%;">
<div class="range-wrapper" style="display: flex;"><input id="" class="tinyMC_range" name="" type="range"> <span class="bar1">|</span> <span class="bar2">|</span></div>
</td>
</tr>
<tr>
<td>EOS %</td>
<td>0.6</td>
<td>L</td>
<td>1.0 - 11.0</td>
<td>%</td>
<td style="text-align: end; width: 20%;">
<div class="range-wrapper" style="display: flex;"><input id="" class="tinyMC_range" name="" type="range" value="51"> <span class="bar1">|</span> <span class="bar2">|</span></div>
</td>
</tr>
<tr>
<td>BAS %</td>
<td>0.0</td>
<td>N</td>
<td>0.0 - 1.2</td>
<td>%</td>
<td style="text-align: end; width: 20%;">
<div class="range-wrapper" style="display: flex;"><input id="" class="tinyMC_range" name="" type="range"> <span class="bar1">|</span> <span class="bar2">|</span></div>
</td>
</tr>
<tr>
<td style="padding-top: 15px;">RBC</td>
<td style="padding-top: 15px;">7.17</td>
<td style="padding-top: 15px;">N</td>
<td style="padding-top: 15px;">4.60 - 10.20</td>
<td style="padding-top: 15px;">10⁶/uL</td>
<td style="padding-top: 15px; text-align: end; width: 20%;">
<div class="range-wrapper" style="display: flex;"><input id="" class="tinyMC_range" name="" type="range"> <span class="bar1">|</span> <span class="bar2">|</span></div>
</td>
</tr>
<tr>
<td>HGB</td>
<td>12.6</td>
<td>N</td>
<td>8.5 - 15.3</td>
<td>g/dL</td>
<td style="text-align: end; width: 20%;">
<div class="range-wrapper" style="display: flex;"><input id="" class="tinyMC_range" name="" type="range"> <span class="bar1">|</span> <span class="bar2">|</span></div>
</td>
</tr>
<tr>
<td>HCT</td>
<td>38.5</td>
<td>N</td>
<td>26.0 - 47.0</td>
<td>%</td>
<td style="text-align: end; width: 20%;">
<div class="range-wrapper" style="display: flex;"><input id="" class="tinyMC_range" name="" type="range"> <span class="bar1">|</span> <span class="bar2">|</span></div>
</td>
</tr>
<tr>
<td>MCV</td>
<td>53.7</td>
<td>N</td>
<td>38.0 - 54.0</td>
<td>fL</td>
<td style="text-align: end; width: 20%;">
<div class="range-wrapper" style="display: flex;"><input id="" class="tinyMC_range" name="" type="range"> <span class="bar1">|</span> <span class="bar2">|</span></div>
</td>
</tr>
<tr>
<td>MCH</td>
<td>17.5</td>
<td>N</td>
<td>11.8 - 18.0</td>
<td>pg</td>
<td style="text-align: end; width: 20%;">
<div class="range-wrapper" style="display: flex;"><input id="" class="tinyMC_range" name="" type="range"> <span class="bar1">|</span> <span class="bar2">|</span></div>
</td>
</tr>
<tr>
<td>MCHC</td>
<td>32.6</td>
<td>N</td>
<td>29.0 - 36.0</td>
<td>g/dL</td>
<td style="text-align: end; width: 20%;">
<div class="range-wrapper" style="display: flex;"><input id="" class="tinyMC_range" name="" type="range"> <span class="bar1">|</span> <span class="bar2">|</span></div>
</td>
</tr>
<tr>
<td>RDW %</td>
<td>18.1</td>
<td>N</td>
<td>16.0 - 23.0</td>
<td>%</td>
<td style="text-align: end; width: 20%;">
<div class="range-wrapper" style="display: flex;"><input id="" class="tinyMC_range" name="" type="range"> <span class="bar1">|</span> <span class="bar2">|</span></div>
</td>
</tr>
<tr>
<td style="padding-top: 15px;">PLT</td>
<td style="padding-top: 15px;">152</td>
<td style="padding-top: 15px;">N</td>
<td style="padding-top: 15px;">100 - 518</td>
<td style="padding-top: 15px;">10&sup3;/uL</td>
<td style="padding-top: 15px; text-align: end; width: 20%;">
<div class="range-wrapper" style="display: flex;"><input id="" class="tinyMC_range" name="" type="range"> <span class="bar1">|</span> <span class="bar2">|</span></div>
</td>
</tr>
<tr>
<td>MPV</td>
<td>12.1</td>
<td>N</td>
<td>9.9 - 16.3</td>
<td>fL</td>
<td style="text-align: end; width: 20%;">
<div class="range-wrapper" style="display: flex;"><input id="" class="tinyMC_range" name="" type="range"> <span class="bar1">|</span> <span class="bar2">|</span></div>
</td>
</tr>
</tbody>
</table>';
        $lap_cbc->type = "saved";
        $lap_cbc->save();


        $lap_cbc = new LabTestPrescription();
        $lap_cbc->prescription_name = "Biochemical";
        $lap_cbc->prescription_content = '<table style="border-collapse: collapse; width: 100%;">
<thead>
<tr>
<th style="text-align: start; margin-bottom: 5px;">Parameter</th>
<th style="text-align: start; margin-bottom: 5px;">Result</th>
<th style="text-align: start; margin-bottom: 5px;">Ref. Value</th>
<th style="text-align: start; margin-bottom: 5px;">Unit</th>
</tr>
</thead>
<tbody>
<tr>
<td>BUN</td>
<td>16.2</td>
<td>15.0 - 32.0</td>
<td>mg/dl</td>
</tr>
<tr>
<td>Creatinine</td>
<td>1.0</td>
<td>0.8 - 1.8</td>
<td>mg/dl</td>
</tr>
<tr>
<td>Phosphorus</td>
<td>2.6</td>
<td>2.6 - 6.0</td>
<td>mg/dl</td>
</tr>
<tr>
<td style="padding-top: 15px;">Calcium</td>
<td style="padding-top: 15px;">9.0</td>
<td style="padding-top: 15px;">8.8 - 11.9</td>
<td style="padding-top: 15px;">mg/dl</td>
</tr>
<tr>
<td>Albumin</td>
<td>3.2</td>
<td>2.3 - 3.5</td>
<td>g/dl</td>
</tr>
<tr>
<td>Glucose</td>
<td class="high">164</td>
<td>70 - 130</td>
<td>mg/dl</td>
</tr>
<tr>
<td>Cholesterol</td>
<td class="low">58</td>
<td>70 - 200</td>
<td>mg/dl</td>
</tr>
<tr>
<td style="padding-top: 15px;">ALT (GPT)</td>
<td style="padding-top: 15px;">64</td>
<td style="padding-top: 15px;">0 - 100</td>
<td style="padding-top: 15px;">U/l</td>
</tr>
<tr>
<td>AST (GOT)</td>
<td>34</td>
<td>0 - 50</td>
<td>U/l</td>
</tr>
<tr>
<td>ALP</td>
<td>25</td>
<td>0 - 90</td>
<td>U/l</td>
</tr>
<tr>
<td>GGT</td>
<td>&lt;10</td>
<td>0 - 10</td>
<td>mg/dl</td>
</tr>
<tr>
<td>Total Bilirubin</td>
<td>0.1</td>
<td>0.0 - 0.5</td>
<td>mg/dl</td>
</tr>
<tr>
<td style="padding-top: 15px;">Amylase</td>
<td style="padding-top: 15px;">866</td>
<td style="padding-top: 15px;">100 - 1500</td>
<td style="padding-top: 15px;">U/l</td>
</tr>
<tr>
<td>Lipase</td>
<td>26</td>
<td>0 - 60</td>
<td>U/l</td>
</tr>
<tr>
<td>Magnesium</td>
<td class="low">1.7</td>
<td>1.8 - 2.7</td>
<td>mg/dl</td>
</tr>
<tr>
<td>Triglycerides</td>
<td class="low">11</td>
<td>15 - 105</td>
<td>mg/dl</td>
</tr>
<tr>
<td style="padding-top: 15px;">Sodium</td>
<td style="padding-top: 15px;">151</td>
<td style="padding-top: 15px;">147 - 156</td>
<td style="padding-top: 15px;">mEq/l</td>
</tr>
<tr>
<td>Potassium</td>
<td>4.1</td>
<td>3.4 - 5.3</td>
<td>mEq/l</td>
</tr>
<tr>
<td>Chloride</td>
<td>115</td>
<td>107 - 125</td>
<td>mEq/l</td>
</tr>
<tr>
<td>Na/K Ratio</td>
<td>37</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
</tbody>
</table>';
        $lap_cbc->type = "saved";
        $lap_cbc->save();


        $lap_cbc = new LabTestPrescription();
        $lap_cbc->prescription_name = "Urine";
        $lap_cbc->prescription_content = '<table style="border-collapse: collapse; width: 100%;">
<thead>
<tr>
<th style="text-align: start; border-top: 1px solid black; border-bottom: 1px solid black;">TEST NAME</th>
<th style="text-align: start; border-top: 1px solid black; border-bottom: 1px solid black;">OBSERVATION</th>
<th style="text-align: start; border-top: 1px solid black; border-bottom: 1px solid black;">UNITS</th>
<th style="text-align: start; border-top: 1px solid black; border-bottom: 1px solid black;">Bio. Ref. Interval</th>
</tr>
</thead>
<tbody>
<tr>
<td style="font-weight: bold;" colspan="4">Complete Urinogram</td>
</tr>
<tr>
<td style="font-weight: bold;" colspan="4">Physical Examination</td>
</tr>
<tr>
<td>VOLUME</td>
<td>3</td>
<td>mL</td>
<td>-</td>
</tr>
<tr>
<td>COLOUR</td>
<td>Yellow</td>
<td>-</td>
<td>Pale Yellow</td>
</tr>
<tr>
<td>APPEARANCE</td>
<td>CLEAR</td>
<td>-</td>
<td>Clear</td>
</tr>
<tr>
<td>SPECIFIC GRAVITY</td>
<td>1.02</td>
<td>-</td>
<td>1.003 - 1.030</td>
</tr>
<tr>
<td>PH</td>
<td>6.5</td>
<td>-</td>
<td>5 - 8</td>
</tr>
<tr>
<td style="font-weight: bold;" colspan="4">Chemical Examination</td>
</tr>
<tr>
<td>URINARY PROTEIN</td>
<td>ABSENT</td>
<td>mg/dL</td>
<td>Absent</td>
</tr>
<tr>
<td>URINARY GLUCOSE</td>
<td>ABSENT</td>
<td>mg/dL</td>
<td>Absent</td>
</tr>
<tr>
<td>URINE KETONE</td>
<td>ABSENT</td>
<td>mg/dL</td>
<td>Absent</td>
</tr>
<tr>
<td>URINARY BILIRUBIN</td>
<td>ABSENT</td>
<td>mg/dL</td>
<td>Absent</td>
</tr>
<tr>
<td>UROBILINOGEN</td>
<td>Normal</td>
<td>mg/dL</td>
<td>&lt;= 0.2</td>
</tr>
<tr>
<td>BILE SALT</td>
<td>ABSENT</td>
<td>-</td>
<td>Absent</td>
</tr>
<tr>
<td>BILE PIGMENT</td>
<td>ABSENT</td>
<td>-</td>
<td>Absent</td>
</tr>
<tr>
<td>URINE BLOOD</td>
<td>ABSENT</td>
<td>-</td>
<td>Absent</td>
</tr>
<tr>
<td>NITRITE</td>
<td>ABSENT</td>
<td>-</td>
<td>Absent</td>
</tr>
<tr>
<td style="font-weight: bold;" colspan="4">Microscopic Examination</td>
</tr>
<tr>
<td>MUCUS</td>
<td>ABSENT</td>
<td>-</td>
<td>Absent</td>
</tr>
<tr>
<td>RED BLOOD CELLS</td>
<td>3</td>
<td>cells/HPF</td>
<td>0 - 5</td>
</tr>
<tr>
<td>URINARY LEUCOCYTES (PUS CELLS)</td>
<td>5</td>
<td>cells/HPF</td>
<td>0 - 5</td>
</tr>
<tr>
<td>EPITHELIAL CELLS</td>
<td>5</td>
<td>cells/HPF</td>
<td>0 - 5</td>
</tr>
<tr>
<td>CASTS</td>
<td>ABSENT</td>
<td>-</td>
<td>Absent</td>
</tr>
<tr>
<td>CRYSTALS</td>
<td>ABSENT</td>
<td>-</td>
<td>Absent</td>
</tr>
<tr>
<td>BACTERIA</td>
<td>ABSENT</td>
<td>-</td>
<td>Absent</td>
</tr>
<tr>
<td>YEAST</td>
<td>ABSENT</td>
<td>-</td>
<td>Absent</td>
</tr>
<tr>
<td>PARASITE</td>
<td>ABSENT</td>
<td>-</td>
<td>Absent</td>
</tr>
</tbody>
</table>
<p><strong>Method:</strong> Fully Automated Matrix AVE Urinalysis Dipstick Method, Microscopy</p>';
        $lap_cbc->type = "saved";
        $lap_cbc->save();


        $lap_cbc = new LabTestPrescription();
        $lap_cbc->prescription_name = "Kit";
        $lap_cbc->prescription_content = '<h4 style="font-weight: bold; text-decoration: underline; text-align: center; margin-bottom: 15px;">Rapid Test Kit Report</h4>
<table style="border-collapse: collapse; width: 100%;">
<thead>
<tr>
<th style="text-align: start; background: #B7DDE8;">Test name</th>
<th style="text-align: start; background: #B7DDE8;">Sample</th>
<th style="text-align: start; background: #B7DDE8;">Result</th>
</tr>
</thead>
<tbody>
<tr>
<td>FPV Ag</td>
<td>Saliva &amp; facal swab</td>
<td>&nbsp;</td>
</tr>
</tbody>
</table>';
        $lap_cbc->type = "saved";
        $lap_cbc->save();


        $lap_cbc = new LabTestPrescription();
        $lap_cbc->prescription_name = "Faces";
        $lap_cbc->prescription_content = '<h4 style="font-weight: bold; text-decoration: underline; text-align: center; margin-bottom: 15px;">Rapid Test Faces Report</h4>
<table style="border-collapse: collapse; width: 100%;">
<thead>
<tr>
<th style="text-align: start; background: #B7DDE8;">Test name</th>
<th style="text-align: start; background: #B7DDE8;">Sample</th>
<th style="text-align: start; background: #B7DDE8;">Result</th>
</tr>
</thead>
<tbody>
<tr>
<td>FPV Ag</td>
<td>Saliva &amp; facal swab</td>
<td>&nbsp;</td>
</tr>
</tbody>
</table>';
        $lap_cbc->type = "saved";
        $lap_cbc->save();


        $lap_cbc = new LabTestPrescription();
        $lap_cbc->prescription_name = "X-Ray";
        $lap_cbc->prescription_content = '<h4 class="headline">Clinical history</h4>
<p class="title">Lorem, ipsum dolor.</p>
<h4 class="headline">Technique</h4>
<p class="title">Lorem, ipsum dolor.</p>
<h4 class="headline">Findings</h4>
<p class="title">Lorem, ipsum dolor.</p>
<h4 class="headline">Impressions</h4>
<p class="title">Lorem, ipsum dolor.</p>
<h4 class="headline">Recommendations</h4>
<p class="title">Lorem, ipsum dolor.</p>
<h4 class="headline">Findings</h4>
<h4 class="headline">&nbsp;</h4>
<h4 class="headline">&nbsp;</h4>
<h4 class="headline">&nbsp;</h4>';
        $lap_cbc->type = "saved";
        $lap_cbc->save();


        $lap_cbc = new LabTestPrescription();
        $lap_cbc->prescription_name = "Ultrasonic";
        $lap_cbc->prescription_content = '<h4 class="headline">Clinical history</h4>
<p class="title">Lorem, ipsum dolor.</p>
<h4 class="headline">Technique</h4>
<p class="title">Lorem, ipsum dolor.</p>
<h4 class="headline">Findings</h4>
<p class="title">Lorem, ipsum dolor.</p>
<h4 class="headline">Impressions</h4>
<p class="title">Lorem, ipsum dolor.</p>
<h4 class="headline">Recommendations</h4>
<p class="title">Lorem, ipsum dolor.</p>
<h4 class="headline">Findings</h4>
<h4 class="headline">&nbsp;</h4>
<h4 class="headline">&nbsp;</h4>
<h4 class="headline">&nbsp;</h4>';
        $lap_cbc->type = "saved";
        $lap_cbc->save();

    }
}
