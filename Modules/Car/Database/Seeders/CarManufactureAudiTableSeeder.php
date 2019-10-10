<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarManufactureAudiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Audi = ['Audi 60 (1969–1972)', 'Audi 100 (1968–1978)', 'Audi 80 (1972–1978)', 'Audi 50 (1974–1978)', 'Audi 100 (1969–1976)', 'Audi 100 Coupé S (1969–1974)'
        , 'Audi 80 (1978–1986)', 'Audi 200 5T (1979–1984)', 'Audi 100 (1982–1990)', 'Audi 80 quattro (1980–1987)', 'Audi 5+5 (1981-1983)'
        , 'Audi 90 (1984–1987)', 'Audi Coupe GT (1980–1987)', 'Audi Sport quattro (1983–1984)', 'Audi 80 (1986–1991)', 'Audi 90 (1986–1991)'
        , 'Audi V8 (1988–1995)', 'Audi Coupe (1988–1995)', 'Audi 100/A6 (1991–1998)', 'Audi 80 (1991–1996)', 'Audi Cabriolet (1990–2000)'
        , 'Audi A8 (1994–2003)', 'Audi A4 (1994–2001)', 'Audi A3 (1996–2003)', 'Audi A6 (1997–2006)', 'Audi Duo (1997)'
        , 'Audi TT Coupe (1998–2006)', 'Audi TT Roadster (1999–2006)', 'Audi A2 (1999–2006)', 'Audi 90s 1993', 'Audi A4 (2001–present)'
        , 'Audi A8 (2003–present)', 'Audi A3 (2003–present)', 'Audi A6 (2004–present)', 'Audi A3 Sportback (2005–present)', 'Audi Q7 (2005–present)'
        , 'Audi A6 allroad quattro (2006–present)', 'Audi A4 Cabriolet (2002–2006)', 'Audi TT (2006–present)', 'Audi A4 (2007–present)'
        , 'Audi A5 (2007–present)', 'Audi Q5 (2008–present)', 'Audi TT 2.0 TDI quattro (2008–present)', 'Audi A4 allroad quattro (2009–present)'
        , 'Audi R8 (2006-present)', 'Audi R8 V10', 'Audi A1 (2010–present)', 'Audi A3 (2003–present)', 'Audi A5 (2003–present)'
        , 'Audi A6 (2011–present)', 'Audi A6 allroad quattro (2012–present)', 'Audi A7 (2010–present)', 'Audi A8 (2010–present)'        , 'Audi Q2 (2017-present)'
        , 'Audi Q3 (2011–present)', 'Audi Q5 (2008–present)', 'Audi Q7 (2005–present)', 'Audi Q8 (2008–present)', 'Audi R8 (2015-present)'
        , 'Audi TT (2017-present)', 'Audi e-tron (TBD)', 'Audi S2 Coupé B3 (1990–1995)', 'Audi S4 C4 (1991–1995)', 'Audi S2 Avant B4 (1992-1995)'
        , 'Audi S2 Sedan B4 (1993-1994)', 'Audi Avant RS 2 P1 (1993–1994)', 'Audi S8 D2 (1994–2003)', 'Audi S6 C4 (1994–1997)', 'Audi S4 quattro B5 (1997–2002)'
        , 'Audi S6 C5 (1999–2004)', 'Audi S3 8L (1999–2003)', 'Audi RS 4 Avant B6 (2000–2001)', 'Audi S4 B6 (2002–2005)', 'Audi RS 6 C5 (2002–2004)'
        , 'Audi S3 8P (2006-2012)', 'Audi RS 4 B7 (2006–2008)', 'Audi S4 B7 (2006–2008)', 'Audi S8 D3 (2006–2010)', 'Audi S5 B8 (2007–2012)'
        , 'Audi R8 42 (2007–2015)', 'Audi RS 6 C6 (2007–2011)', 'Audi TTS (2008–)', 'Audi TT RS 8J (2009– 2016)', 'Audi RS5 8T (2010–2015)'
        , 'Audi S8 D4 (2010–2017)', 'Audi R8 GT (2010–2013)', 'Audi S3 8V (2012–)', 'Audi S7 4G (2012–2017)', 'Audi S5 B8.5 (2013–2017)'
        , 'Audi RS 6 C7 (2013–)', 'Audi RS7 C7 (2013–)', 'Audi S1 8X (2015–)', 'Audi R8 4S (2015–)', 'Audi TT RS 8S (2016–)'
        , 'Audi S5 B9 (2017–)', 'Audi RS5 (2017–)'];

        foreach($Audi as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Audi',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '22',
                'count' => 0
            ]);
        }
    }
}
