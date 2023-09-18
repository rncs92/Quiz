<?php declare(strict_types=1);

namespace Vendon\Controllers\Statistics;

use Vendon\Core\TwigView;

class StatisticsController
{
    public function __construct()
    {
    }

    public function index(): TwigView
    {
        return new TwigView('Statistics/statistics', []);
    }
}