<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mLpaMeals extends Model
{
    use HasFactory;

    //No. Kobo	Nombre de kobo	Enlace al kobo	Usuario (cuenta administradora)	Contraseña (cuenta administradora)	
    //Sigue recolectando datos	Número de registros recolectados	Contrato/proyecto
    protected $fillable = [
        "no_kobo",
        "nombre_kobo",
        "enlace_kobo",
        "usuario",
        "contrasena",
        "sigue_recolectando_datos",
        "numero_registros_recolectados",
        "contrato/proyecto",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        ""
    ];


    
    Variables transversales/de identificación																																				Servicios												Atención SMAPS							Signos vitales					Atención primaria en salud																										Atención en Salud Sexual y Reproductiva																							Datos antropométricos									Lactancia materna						Diagnósticos nutricionales														Entregas																						Sensibilizaciones en SSR				Sensibilizaciones en salud														Sensibilización Nutrición					
    Contrato	N1 País	N2 Estado/Departamento	N3 Municipio	Comunidad	Otra ubicación	Lugar de la atención (Centro/estructura de salud)	Fecha de atención	Área que reporta	Nombre (reemplazar por ID)	Fecha de nacimiento	Estatus	Dio su consentimiento	Nombre Representante legal (solo aplica para menores con representante legal)	ID representante legal	Edad	Género	Nacionalidad 1	Nacionalidad 2	¿La persona está escolarizada?	Grado de escolaridad	Tipo de identificación	Colectivo LGTBIQ+	Pertenencia étnica	Con discapacidad	Tipo de discapacidad	Persona gestante	Persona en periodo de lactancia	Característica familia	Tipo familia	Vocación familia migrante	Estatus migratorio	Afiliación a servicios de salud pública	Carné de vacunas actualizado	Esquema de vacunas completo	Tipo de vivienda	Tipo de atención 	Modalidad de atención	Nutrición	Atención primaria en salud	Atención en salud sexual reproductiva (SSR)	Tamizaje	Atención en salud mental	SMAPS- Protección atención individual	SMAPS- Protección atención colectiva	Sensibilización Salud, higiene y autocuidado	Sensibilización Alimentación, diversidad alimentaria y nutrición	Sensibilización Salud sexual y reproductiva	Tipo de intervención en salud mental	Tipo de intervención SMAPS Individual	Tipo de intervención SMAPS colectiva	Impresión Diagnostica SMAPS	¿Se deriva la persona POR SMAPS?	¿A dónde se deriva la persona por SMAPS?	Motivo de derivación	P/A	Frecuencia Cardiaca	Frecuencia Respiratoria	Temperatura°	Saturación O2%	Motivo de consulta de atención primaria en salud	Diagnóstico 1	Diagnóstico 2	Diagnóstico 3	Diagnóstico 4	Diagnóstico 5	Diagnóstico 6	Diagnóstico 7	Diagnóstico 8	Diarrea	Desde cuándo diarrea (días)	Vómito	Episodios de vómito en las últimas 4 horas	¿Qué líquidos ha recibido el niño/la niña mientras ha tenido diarrea o vómito?	¿El niño/la niña ha tenido fiebre?	¿Desde cuándo tiene fiebre?	¿El niño/ la niña ha tenido tos y/o dificultad para respirar?	Exposición a dengue (últimos 15 días en áreas de transmisión)	Exposición a Malaria (últimos 15 días en áreas de transmisión)	¿El niño/la niña tiene poblemas de oído?	¿Al niño o niña le supura el oído?	¿Tiene dolor de garganta?	Signos de deshidratación	Signos de maltrato infantil	Sospecha de maltrato	Remisión por maltrato	Servicio SSR brindado 1	Servicio SSR brindado 2	Semanas de gestación	Atención del embarazo	Controles prenatales	Cuántos Controles prenatales	Semana de gestación del último control prenatal	Seleccione el motivo por el cual no se ha realizado los controles prenatales	Planifica	Metodos anticonceptivos usados	Disposición a planificar	Número de gestaciones	Número de partos	Número de cesáreas	Número de Abortos	Número de Nacidos muertos:	Número de Nacidos vivos:	Atención ginecológicas	Diagnóstico de ITS	Medicamentos que recetó	Se deriva la persona atendida por SSR?  	¿A dónde se deriva la persona?	Motivo de derivación	Peso actual (kg)	Talla o Longitud actual (cm)	Índice de Masa Corporal (IMC) (para mayores de 5 años)	Perímetro braquial (cm)	Perimetro cefálico	Hemoglobina (g/dL)	Glucometría (mg/dL)	Peso pregestacional (Kg):	Forma de medición del niño/la niña	¿El niño/la niña se alimenta de leche materna?	¿Cuántas veces al día le da leche materna?	¿El niño o la niña fue amamantado ayer durante el día o la noche ó consumio leche materna a traves de otro medio?	¿Consumió el niño o la niña alguno de los siguientes alimentos?	¿La lactancia materna del niño o niña es exlusiva?	¿El niño/la niña usa biberón?	Diagnóstico nutricional IMC/Edad gestacional primario	Diagnóstico nutricional/Impresión diagnóstica principal	Diagnóstico nutricional secundario	Manejo caso desnutrición	Desparasitación últimos 6 meses	Seleccione el grado de obesidad	Resultado del seguimiento	Requiere suplementación nutricional	¿Requiere seguimiento nutricional?	Estado general de niño/a	Aspecto general de niño/a	Valoración del edema nutricional niño/a	Grado del edema nutricional niño/a	Signos clínicos de desnutrición niño/a	Entrega de medicamentos	Entrega de fórmulas nutricionales	Entrega de insumos médico nutricionales	Entrega de desparasitantes	Entrega de Suplementos 	Entrega de Micronutrientes	Líquidos a administrar (Ml/Kg/dia)	Cantidad entregada de RUTF (categoría genérica)	Cantidad entregada de LNS (categoría genérica)	Cantidad de incaparina preparada entregada	Cantidad entregada de Plumply Mum para rehabilitación nutricional de mujeres embarazadas y lactantes padeciendo de desnutrición aguda moderada (sobre 92 grs)	Cantidad entregada de Pumply Nut fórmula terapéutica para rehabilitación nutricional de pacientes padeciendo de desnutrición aguda severa y moderada (sobre de 92 grs.)	Cantidad entregada de Plumply Doz para prevención de riesgo y/o tratamiento de niños con desnutrición aguda moderada (sobre por 50 grs)	Cantidad entregada de Enov Nutributter, sachet 20 gr/110 kcal	Cantidad entregada de Enov Mum, sachet 20 gr	Sachet lípidos con concentración de grasas	Medicamentos entregados1	Medicamentos entregados2	Medicamentos entregados 3	Anticonceptivos entregados1	Anticonceptivos entregados 2	Insumos entregados	Derechos sexuales y reproductivos	Métodos de planificación familiar	Prevención y protección de infecciones de transmisión sexual (ITS)	Otro	Prevención y manejo de la anemia	Lavado e higiene de manos	Cuidados durante la gestación	Promoción de la salud dental	Alimentación adecuada durante la gestación	Esquema de vacunación para la edad gestacional	Cuidados básicos del recién nacido	Consumo de agua segura	Prevención y manejo de EDA	Prevención y manejo de IRA	Prevención de la pediculosis	Control de vectores	Signos de alarma	Otro	Lactancia materna exclusiva y complementaria	Alimentación complementaria	Alimentación de la madre gestante y lactante	Prevención, detección y manejo en el hogar de la desnutrición aguda	Uso de alimentos terapeúticos y otros suplementos	Otro


}
