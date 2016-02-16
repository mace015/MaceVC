<?php namespace Console\Command\MakeController;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class MakeControllerCommand extends Command{

    protected function configure(){
        $this
            ->setName('make:controller')
            ->setDescription('Create a new controller')
            ->addArgument('name', InputArgument::REQUIRED, 'Controller class name');
    }

    protected function execute(InputInterface $input, OutputInterface $output){

        global $__PATH;

        $name = $input->getArgument('name');
        $path = $__PATH . 'app/controllers/' . $name . '.php';

        $template = file_get_contents($__PATH . 'core/console/command/MakeController/MakeControllerTemplate.txt');
        $template = str_replace(
            array(
                '[CONTROLLER_NAME]'
            ),
            array(
                $name
            ),
            $template
        );

        if ($this->write($path, $template)){

            $output->writeln('<info>Controller has been created!</info>');

        } else {

            $output->writeln('<error>Controller already exists!</error>');

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
