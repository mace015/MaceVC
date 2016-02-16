<?php namespace Console\Command\MakeMiddleware;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class MakeMiddlewareCommand extends Command{

    protected function configure(){
        $this
            ->setName('make:middleware')
            ->setDescription('Create a new middleware.')
            ->addArgument('name', InputArgument::REQUIRED, 'Middleware class name.');
    }

    protected function execute(InputInterface $input, OutputInterface $output){

        global $__PATH;

        $name = $input->getArgument('name');
        $path = $__PATH . 'app/middleware/' . $name . '.php';

        $template = file_get_contents($__PATH . 'core/console/command/MakeMiddleware/MakeMiddlewareTemplate.txt');
        $template = str_replace(
            array(
                '[MIDDLEWARE_NAME]'
            ),
            array(
                $name
            ),
            $template
        );

        if ($this->write($path, $template)){

            $output->writeln('<info>Middleware has been created!</info>');

        } else {

            $output->writeln('<error>Middleware already exists!</error>');

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
