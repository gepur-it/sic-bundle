# sic-bundle
Single Instance Console Command Bundle

 provides the ability to ban more than one command instance
 
 add bundle in bundles.php
 
 ```$php
return [
    ...
    GepurIt\SingleInstanceCommandBundle\SingleInstanceCommandBundle::class => ['all' => true],
    ...
];
 ```
 
 to mark command as single instance, add interface to your command,
 and add method getLockName()
 
```$php
class MyCommand extends Command implements SingleInstanceInterface {
    ...
    
    /**
     * get`s lock name for command execution, based on input
     * @param InputInterface $input
     * @return string
     */
    public function getLockName(InputInterface $input): string
    {
        return $this->getName();
    }
    
    ...
}
```

to allow to run the same command with different args, use $input in getLockName() method
```$php

class MyCommand extends Command implements SingleInstanceInterface {
    ...
    
    /**
     * get`s lock name for command execution, based on input
     * @param InputInterface $input
     * @return string
     */
    public function getLockName(InputInterface $input): string
    {
        return $this->getName().':'.$input->getArgument('myArg');
    }
    
    ...
}

```