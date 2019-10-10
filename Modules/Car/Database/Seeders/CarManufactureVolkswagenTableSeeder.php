<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarManufactureVolkswagenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Volkswagen = ['Volkswagen Amarok (2009–present)', 'Volkswagen Ameo (2016–present)', 'Volkswagen Arteon (2017–present)', 'Volkswagen Atlas (2017–present, also sold as Volkswagen Teramont)'
        , 'Volkswagen Caddy (1980–present)', 'Volkswagen California (2003–present)', 'Volkswagen Fox (2005–present)', 'Volkswagen Gol G5 (2008–present, also sold as Pointer)'
        , 'Volkswagen Golf Mk7 (2012–present)', 'Volkswagen Jetta A7 (2019–present)', 'Volkswagen Lamando (2014-present)', 'Volkswagen Lavida (2008–present)'
        , 'Volkswagen Beetle A5 (2011–present)', 'Volkswagen Passat B8 (2014–present, also sold as Passat GT)', 'Volkswagen Passat "B7" (2012–present)'
        , 'Volkswagen Polo Mk5 (2009–present)', 'Volkswagen Polo Blue GT (2017-present)', 'Volkswagen Santana (1981–present, also sold as Volkswagen Quantum)'
        , 'Volkswagen Sharan (1995–present)', 'Volkswagen Tiguan (2009–present)', 'Volkswagen Touareg II (2010–present)', 'Volkswagen Touran (2003–present)'
        , 'Volkswagen Transporter T6 (2015–present)', 'Volkswagen Up (2011–present)', 'Volkswagen Vento known as Volkswagen Polo Sedan (2010–present)'
        , 'Volkswagen XL 1 (2013-present)', 'Volkswagen 181 (1961-1983, also sold as Kurierwagen, Trekker, Thing, Safari)', 'Volkswagen Apollo (1990-1992)'
        , 'Volkswagen Beetle (1938-2003) (Internal designation: Volkswagen Type 1)', 'Volkswagen Brasília (1973-1982)', 'Volkswagen Cabrio (1979–2002)'
        , 'Volkswagen CC (2008–2017)', 'Volkswagen Citi Golf (1984–2009)', 'Volkswagen Corrado (1988-1995)', 'Volkswagen Country Buggy (1967-1969)'
        , 'Volkswagen Derby (1977-1981), (1995-2009, also sold as Polo Classic)', 'Volkswagen Eos (2006–2015)'
        , 'Volkswagen Gol G1 (1987-1993, also sold as Parati, Pointer, Fox)', 'Volkswagen Gol G2, G3, G4 (1994-2008, also sold as Pointer)'
        , 'Volkswagen Golf Mk1 (1974-2009)', 'Volkswagen Golf Mk2 (1983-1992)', 'Volkswagen Golf Mk3 (1991-1999)', 'Volkswagen Golf Mk4 (1999-2006)'
        , 'Volkswagen Golf Mk5 (2003-2009, also sold as Rabbit)', 'Volkswagen Golf Mk6 (2009–2013)', 'Volkswagen Iltis (1978–1988)'
        , 'Volkswagen Jetta A1 (1979-1984, also sold as Atlantic, Fox)', 'Volkswagen Jetta A2 (1985-1991)', 'Volkswagen Jetta A3 (1992-1998, also sold as Vento)'
        , 'Volkswagen Jetta A4 (1999-2004, also sold as Bora, Clasico)', 'Volkswagen Jetta A5 (2005–2011, also sold as Bora, Vento, Sagitar)'
        , 'Volkswagen K70 (1968–1972)', 'Volkswagen Karmann Ghia (1955-1974, also sold as Type 34 Karmann Ghia, 1500 Karmann Ghia Coupe)'
        , 'Volkswagen Kommandeurswagen (1941–1944)', 'Volkswagen Kübelwagen (1940–1945)', 'Volkswagen Lupo (1998–2005)'
        , 'Volkswagen Logus (1993–1997,based on the Ford Escort mk5 version)', 'Volkswagen New Beetle (1997–2011)', 'Volkswagen Santana (1984–1989)'
        , 'Volkswagen Passat B1 (1973-1981, also sold as Dasher)', 'Volkswagen Passat B2 (1982-1988, also sold as Quantum, Santana, Corsar, Carat)'
        , 'Volkswagen Passat B3 (1988-1993)', 'Volkswagen Passat B4 (1993-1996)', 'Volkswagen Passat B5 (1996-2005)', 'Volkswagen Passat B6 (2005–2010)'
        , 'Volkswagen Passat B7 (2010–2014)', 'Volkswagen Phaeton (2002–2016)', 'Volkswagen Pointer (1993-1997, also sold as Logus)'
        , 'Volkswagen Polo Mk1 (1975-1981, also sold as Derby)', 'Volkswagen Polo Mk2 (1982-1993, also sold as Derby & Classic II)'
        , 'Volkswagen Polo Mk3 (1994-2001, also sold as Classic III)', 'Volkswagen Polo Mk4 (2002–2009, also sold as Polo Vivo)', 'Volkswagen Polo Playa (1996-2002)'
        , 'Volkswagen-Porsche 914 (1969-1976, also sold as Porsche 914)', 'Volkswagen Routan (2008–2014)', 'Volkswagen Scirocco I (1974-1982)', 'Volkswagen Scirocco II (1982-1992)'
        , 'Volkswagen Scirocco III (2008-2017)', 'Volkswagen Schwimmwagen (1942–1944)', 'Volkswagen SP2 (1972-1976)', 'Volkswagen LT (1975–2006)'
        , 'Volkswagen Transporter T4 (1990-2003, also sold as Caravelle, Eurovan)', 'Volkswagen Transporter T5 (2003–2015, also sold as Caravelle, Multivan)'
        , 'Volkswagen Type 2 T1 (1950-1975)', 'Volkswagen Type 2 T2 (1967–2013, also sold as Kombi)', 'Volkswagen Type 2 T3 (1979-2002, also sold as Caravelle, Transporter, Vanagon, T25)'
        , 'Volkswagen Type 3 (1961-1973, also sold as 1500, 1600)', 'Volkswagen Type 4 (1967-1973)', 'Volkswagen Type 14A (1949–1953)', 'Volkswagen Type 18A (1949–?)'
        , 'Volkswagen Type 147 Kleinlieferwagen (1964–1974)', 'Volkswagen Golf', 'Volkswagen Sharan', 'Volkswagen Polo', 'Volkswagen Jetta', 'Volkswagen Passat'];

        foreach($Volkswagen as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Volkswagen',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '20',
                'count' => 0
            ]);
        }
    }
}
