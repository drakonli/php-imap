<?php

namespace PhpImap\Mail\Body\Part\Structure\Collection\Factory\Basic;

use PhpImap\Mail\Body\Part\Structure\Collection\Basic\BasicImapMailBodyPartStructureCollection;
use PhpImap\Mail\Body\Part\Structure\Collection\Factory\ImapMailBodyPartStructureCollectionFactoryInterface;
use PhpImap\Mail\Body\Part\Structure\Extractor\ImapMailBodyPartStructureExtractorInterface;
use PhpImap\Mail\Body\Part\Structure\Parameter\Collection\Basic\BasicImapMailBodyPartStructureParameterCollection;
use PhpImap\Mail\Body\Part\Structure\Parameter\ParameterBag\ParameterBagImapMailBodyPartStructureParameter;
use PhpImap\Mail\Body\Part\Structure\ParameterBag\ParameterBagImapMailBodyPartStructure;
use stdClass;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicImapMailBodyPartStructureCollectionFactory implements ImapMailBodyPartStructureCollectionFactoryInterface
{
    /**
     * @var ImapMailBodyPartStructureExtractorInterface
     */
    private $partsExtractor;

    /**
     * BasicImapMailBodyPartStructureCollectionFactory constructor.
     *
     * @param ImapMailBodyPartStructureExtractorInterface $partsExtractor
     */
    public function __construct(ImapMailBodyPartStructureExtractorInterface $partsExtractor)
    {
        $this->partsExtractor = $partsExtractor;
    }

    /**
     * @inheritDoc
     */
    public function createPartCollectionByStructure(stdClass $mailStructure)
    {
        $parts = $this->partsExtractor->extractPartsFromStructure($mailStructure);

        $partStructures = [];

        foreach ($parts as $part) {
            $partData = [];

            $partData[ParameterBagImapMailBodyPartStructure::FIELD_PRIMARY_BODY_TYPE] = new \SplInt(
                $part->{ParameterBagImapMailBodyPartStructure::FIELD_PRIMARY_BODY_TYPE}
            );

            $partData[ParameterBagImapMailBodyPartStructure::FIELD_ENCODING] = new \SplInt(
                $part->{ParameterBagImapMailBodyPartStructure::FIELD_ENCODING}
            );

            if (true === isset($part->{ParameterBagImapMailBodyPartStructure::FIELD_SUBTYPE})) {
                $partData[ParameterBagImapMailBodyPartStructure::FIELD_SUBTYPE] = new \SplString(
                    $part->{ParameterBagImapMailBodyPartStructure::FIELD_SUBTYPE}
                );
            }

            if (true === isset($part->{ParameterBagImapMailBodyPartStructure::FIELD_DESCRIPTION})) {
                $partData[ParameterBagImapMailBodyPartStructure::FIELD_DESCRIPTION] = new \SplString(
                    $part->{ParameterBagImapMailBodyPartStructure::FIELD_DESCRIPTION}
                );
            }

            if (true === isset($part->{ParameterBagImapMailBodyPartStructure::FIELD_ID})) {
                $partData[ParameterBagImapMailBodyPartStructure::FIELD_ID] = new \SplString(
                    $part->{ParameterBagImapMailBodyPartStructure::FIELD_ID}
                );
            }

            if (true === isset($part->{ParameterBagImapMailBodyPartStructure::FIELD_LINES_NUMBER})) {
                $partData[ParameterBagImapMailBodyPartStructure::FIELD_LINES_NUMBER] = new \SplInt(
                    $part->{ParameterBagImapMailBodyPartStructure::FIELD_LINES_NUMBER}
                );
            }

            if (true === isset($part->{ParameterBagImapMailBodyPartStructure::FIELD_BYTES_NUMBER})) {
                $partData[ParameterBagImapMailBodyPartStructure::FIELD_BYTES_NUMBER] = new \SplInt(
                    $part->{ParameterBagImapMailBodyPartStructure::FIELD_BYTES_NUMBER}
                );
            }

            if (true === isset($part->{ParameterBagImapMailBodyPartStructure::FIELD_DISPOSITION})) {
                $partData[ParameterBagImapMailBodyPartStructure::FIELD_DISPOSITION] = new \SplString(
                    $part->{ParameterBagImapMailBodyPartStructure::FIELD_DISPOSITION}
                );
            }

            if (true === isset($part->{ParameterBagImapMailBodyPartStructure::FIELD_CONTENT_DISPOSITION_PARAMETERS})) {
                $dispositionParameters = [];

                foreach ($part->{ParameterBagImapMailBodyPartStructure::FIELD_CONTENT_DISPOSITION_PARAMETERS} as $parameter) {
                    $dispositionParameters[] = new ParameterBagImapMailBodyPartStructureParameter(
                        [
                            ParameterBagImapMailBodyPartStructureParameter::FIELD_VALUE => $parameter->value,
                            ParameterBagImapMailBodyPartStructureParameter::FIELD_ATTRIBUTE =>
                                $this->trimParamName(new \SplString($parameter->attribute)),
                        ]
                    );
                }

                $partData[ParameterBagImapMailBodyPartStructure::FIELD_CONTENT_DISPOSITION_PARAMETERS]
                    = new BasicImapMailBodyPartStructureParameterCollection($dispositionParameters);
            }

            if (true === isset($part->{ParameterBagImapMailBodyPartStructure::FIELD_PARAMETERS})) {
                $parameters = [];

                foreach ($part->{ParameterBagImapMailBodyPartStructure::FIELD_PARAMETERS} as $parameter) {
                    $parameters[] = new ParameterBagImapMailBodyPartStructureParameter(
                        [
                            ParameterBagImapMailBodyPartStructureParameter::FIELD_VALUE => $parameter->value,
                            ParameterBagImapMailBodyPartStructureParameter::FIELD_ATTRIBUTE =>
                                $this->trimParamName(new \SplString($parameter->attribute)),
                        ]
                    );
                }

                $partData[ParameterBagImapMailBodyPartStructure::FIELD_PARAMETERS]
                    = new BasicImapMailBodyPartStructureParameterCollection($parameters);
            }

            $partData[ParameterBagImapMailBodyPartStructure::FIELD_NUMBER] = new \SplString(
                $part->{ParameterBagImapMailBodyPartStructure::FIELD_NUMBER}
            );

            $partStructures[] = new ParameterBagImapMailBodyPartStructure($partData);
        }

        return new BasicImapMailBodyPartStructureCollection($partStructures);
    }

    /**
     * @param \SplString $paramName
     *
     * @return string
     */
    private function trimParamName(\SplString $paramName)
    {
        return strtolower(preg_match('~^(.*?)\*~', $paramName, $matches) ? $matches[1] : $paramName);
    }
}