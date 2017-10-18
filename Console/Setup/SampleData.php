<?php

namespace Unet\SampleData\Console\Setup;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class SampleData
 * @package Unet\SampleData\Console\Setup
 */
class SampleData extends \Symfony\Component\Console\Command\Command
{
    /**
     * @var \Magento\CatalogSampleData\Model\Category
     */
    private $category;

    /**
     * @var \Magento\CmsSampleData\Model\Page
     */
    private $page;

    /**
     * @var \Magento\CmsSampleData\Model\Block
     */
    private $block;

    /**
     * Block constructor.
     * @param null $name
     */
    public function __construct(
        \Unet\SampleData\Model\Category $category,
        \Unet\SampleData\Model\Page $page,
        \Unet\SampleData\Model\Block $block,
        $name = null
    ) {
        $this->category = $category;
        $this->page = $page;
        $this->block = $block;
        parent::__construct($name);
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName('unet:setup')->setDescription('Setup Block');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<info>Setup Category<info>');
        $this->category->install(['Unet_SampleData::fixtures/categories.csv']);

        $output->writeln('<info>Setup Page<info>');
        $this->page->install(['Unet_SampleData::fixtures/pages/pages.csv']);

        $output->writeln('<info>Setup Block<info>');
        $this->block->install(['Unet_SampleData::fixtures/blocks/pages_static_blocks.csv']);
    }
}
