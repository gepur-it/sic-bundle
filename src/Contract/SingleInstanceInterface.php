<?php
/**
 * sic-bundle.
 * Author: Andrii Yakovlev <yawa20@gmail.com>
 * Date: 03.06.19
 */
declare(strict_types=1);

namespace GepurIt\SingleInstanceCommandBundle\Contract;

use Symfony\Component\Console\Input\InputInterface;

/**
 * interface SingleInstanceInterface
 */
interface SingleInstanceInterface
{
    /**
     * get`s lock name for command execution, based on input
     * @param InputInterface $input
     * @return string
     */
    public function getLockName(InputInterface $input): string;
}
