<?php

/**
 * This file is part of ILIAS, a powerful learning management system
 * published by ILIAS open source e-Learning e.V.
 *
 * ILIAS is licensed with the GPL-3.0,
 * see https://www.gnu.org/licenses/gpl-3.0.en.html
 * You should have received a copy of said license along with the
 * source code, too.
 *
 * If this is not the case or you just want to try ILIAS, you'll find
 * us at:
 * https://www.ilias.de
 * https://github.com/ILIAS-eLearning
 *
 *********************************************************************/

class ilTestExportScaffoldPlugin extends ilTestExportPlugin
{
    /** @var string */
    public const CTYPE = 'Modules';

    /** @var string */
    public const CNAME = 'Test';

    /** @var string */
    public const SLOT_ID = 'texp';

    /** @var string */
    public const PNAME = 'TestExportScaffold';

    public function getPluginName(): string
    {
        return self::PNAME;
    }

    /**
     * @throws Exception
     */
    protected function buildExportFile(ilTestExportFilename $export_path): void
    {
        $tmpFile = ilFileUtils::ilTempnam() . '.txt';
        file_put_contents($tmpFile, 'TEST CONTENT, PLEASE IGNORE');
        ilFileUtils::makeDirParents(dirname($export_path->getPathname('txt', 'TestExportScaffold')));
        rename($tmpFile, $export_path->getPathname('txt', 'TestExportScaffold'));
    }

    protected function getFormatIdentifier(): string
    {
        return "testtest";
    }

    public function getFormatLabel(): string
    {
        return "TestExportScaffold";
    }
}
