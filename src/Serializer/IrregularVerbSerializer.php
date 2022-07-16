<?php

namespace App\Serializer;

use App\Entity\IrregularVerb;
use App\Repository\IrregularVerbRepository;

class IrregularVerbSerializer
{

    /**
     * @param IrregularVerb[] $irregularVerbs
     */
    public static function serializeAll(array $irregularVerbs): array
    {
        $response = [];

        foreach ($irregularVerbs as $verb) {
            $response[] = [
                'id' => $verb->getId(),
                'nlInfinitive' => $verb->getNlInfinitive(),
                'nlSimplePastSingular' => $verb->getNlSimplePastSingular(),
                'nlSimplePastPlural' => $verb->getNlSimplePastPlural(),
                'nlPastParticiple' => $verb->getNlPastParticiple(),
                'enInfinitive' => $verb->getEnInfinitive(),
            ];
        }
        return $response;
    }

    public static function conjugate(IrregularVerb $irregularVerb): array
    {
        $infinitive = $irregularVerb->getNlInfinitive();

        $root = str_replace('en', '', $infinitive);
        $secondToLastLetter = substr($root, -2, 1);
        $conjugationForms = [
            'ik %s',
            'jij %st',
            'hij %st',
            'wij '.$infinitive,
            'jullie '.$infinitive,
            'zij '.$infinitive,
        ];

        if(str_ends_with($root, $secondToLastLetter)) {
            $root = substr_replace($root, '', -1);
        }
        if (str_ends_with($root, 'v')) {
            $root = substr_replace($root, 'f', -1);
        }

        foreach ($conjugationForms as $key => $conjugationForm) {
            $conjugationForms[$key] = sprintf($conjugationForm, $root);
        }

        return $conjugationForms;

    }
}
