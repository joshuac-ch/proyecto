<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\contacto;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\contacto>
 */
class contactoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $i = [
            'https://i.pinimg.com/474x/cf/76/bd/cf76bd04d7fea8f238003ab74588e991.jpg',
            'https://i.pinimg.com/474x/a0/c5/78/a0c57804c1aabe26f9d1de6b55419d35.jpg',
            'https://i.pinimg.com/236x/6d/2c/f4/6d2cf45eac5142b36a073a33a769a995.jpg',
            'https://i.pinimg.com/236x/66/ec/20/66ec201dca30a7b24aa2267d7113d70c.jpg',
            'https://i.pinimg.com/474x/e1/02/fe/e102fe79bca98288b0684e86cc54f38f.jpg',
            'https://i.pinimg.com/564x/b9/29/46/b929465e96e700cb48c4383436daad04.jpg',
            'https://i.pinimg.com/564x/45/11/d2/4511d2946ff074669231b682defbd017.jpg',
            'https://i.pinimg.com/236x/6a/f2/d8/6af2d84791781aae3872cdd380333aa5.jpg',
            'https://i.pinimg.com/236x/0f/c4/33/0fc43386ddc2314b428fed83ad803cb5.jpg',
            'https://i.pinimg.com/564x/64/a5/2f/64a52fefe87a7c4ad86f5c6757fe686e.jpg'
        ];
        $n = ['nino', 'wuaguri', 'ichika', 'miku', 'yotsuba', 'itsuki', 'syr'];
        $a = ['nakano', 'alejo', 'kauroko', 'ronin'];
        $c = ["nakanoi267@gmail.com", 'ninonk2121@gmail.com', 'condorenajoshua98@gmial.com'];
        $p = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        $t = ['910320803', '959220177', '949729099', '98212180'];
        return [
            'imagen' => $this->faker->unique()->randomElement($i),
            "nombre" => $this->faker->randomElement($n),
            "apellido" => $this->faker->randomElement($a),
            "correo" => $this->faker->randomElement($c),
            "propietario_id" => $this->faker->randomElement($p),
            "telefono" => $this->faker->randomElement($t),
            "estado_lead" => $this->faker->randomElement([
                "nuevo",
                "calificado",
                "en contacto",
                "interesado",
                "no interesado",
                "en espera",
                "cliente",
                "archivado"
            ])
        ];
    }
}
