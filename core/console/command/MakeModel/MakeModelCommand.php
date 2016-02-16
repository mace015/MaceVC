<?php namespace Console\Command\MakeModel;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class MakeModelCommand extends Command{

    protected function configure(){
        $this
            ->setName('make:model')
            ->setDescription('Create a new model.')
            ->addArgument('name', InputArgument::REQUIRED, 'Model class name.');
    }

    protected function execute(InputInterface $input, OutputInterface $output){

        global $__PATH;

        $name = $input->getArgument('name');
        $path = $__PATH . 'app/models/' . $name . '.php';

        $template = file_get_contents($__PATH . 'core/console/command/MakeModel/MakeModelTemplate.txt');
        $template = str_replace(
            array(
                '[MODEL_NAME]'
            ),
            array(
                $name
            ),
            $template
        );

        if ($this->write($path, $template)){

            $output->writeln('<info>Model has been created!</info>');

        } else {

            $output->writeln('<error>Model already exists!</error>');

        }

    }

    protected function write($path, $template){

        if (!file_exists($path)){

            $file = fopen($path, 'w');
            fwrite($file, $template);
            fclose($file);

            return true;

        }

        return false;

    }

}

?>
