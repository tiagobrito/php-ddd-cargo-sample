<?php
/*
 * This file is part of the codeliner/php-ddd-cargo-sample package.
 * (c) Alexander Miertsch <kontakt@codeliner.ws>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Application\Domain\Model\Voyage;

use Application\Domain\Shared\EntityInterface;

/**
 * A Voyage.
 * 
 * A Voyage is identified by a unique voyage number.
 * 
 * @author Alexander Miertsch <kontakt@codeliner.ws>
 */
class Voyage implements EntityInterface
{
    /**
     * Unique Identifier
     * 
     * @var string
     */
    protected $voyageNumberString;
    
    /**
     * Construct
     * 
     * @param VoyageNumber $voyageNumber
     */
    public function __construct(VoyageNumber $voyageNumber)
    {
        $this->voyageNumberString = $voyageNumber->toString();
    }
    
    /**
     * Get the unique id
     * 
     * @return VoyageNumber
     */
    public function getVoyageNumber()
    {
        return new VoyageNumber($this->voyageNumberString);
    }
    
    /**
     * {@inheritDoc}
     */
    public function sameIdentityAs(EntityInterface $other)
    {
        if (!$other instanceof Voyage) {
            return false;
        }
        
        return $this->getVoyageNumber()->sameValueAs($other->getVoyageNumber());
    }
}
