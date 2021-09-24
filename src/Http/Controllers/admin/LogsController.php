<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogsController extends Controller
{
    public function __construct()
    {
        $this->log_viewer = new \LaravelLogViewer();
        $this->request = app('request');
        $this->pattern = env('LOGVIEWER_PATTERN', '*.log');
        $this->storage_path = env('LOGVIEWER_STORAGE_PATH', storage_path('logs'));
    }

    public function index()
    {
        $folderFiles = [];
        if ($this->request->input('f')) {
            $this->log_viewer->setFolder(\Crypt::decrypt($this->request->input('f')));
            $folderFiles = $this->log_viewer->getFolderFiles(true);
        }
        if ($this->request->input('l')) {
            $this->log_viewer->setFile(\Crypt::decrypt($this->request->input('l')));
        }
        if ($early_return = $this->earlyReturn()) {
            return $early_return;
        }
        $data['log'] = [
            'logs' => $this->log_viewer->all(),
            'folders' => $this->log_viewer->getFolders(),
            'current_folder' => $this->log_viewer->getFolderName(),
            'folder_files' => $folderFiles,
            'files' => $this->log_viewer->getFiles(true),
            'current_file' => $this->log_viewer->getFileName(),
            'current_file_size' => filesize_formatted($this->log_viewer->getFileSize()),
        ];
        if ($this->request->wantsJson()) {
            return $data;
        }

        return view('admin.logs', ['data' => $data]);
    }

    private function earlyReturn()
    {
        if ($this->request->input('f')) {
            $this->log_viewer->setFolder(\Crypt::decrypt($this->request->input('f')));
        }
        if ($this->request->input('dl')) {
            return $this->download($this->pathFromInput('dl'));
        } elseif ($this->request->has('clean')) {
            app('files')->put($this->pathFromInput('clean'), '');
            return $this->redirect($this->request->url());
        } elseif ($this->request->has('del')) {
            app('files')->delete($this->pathFromInput('del'));
            return $this->redirect($this->request->url());
        } elseif ($this->request->has('delall')) {
            $files = ($this->log_viewer->getFolderName())
                        ? $this->log_viewer->getFolderFiles(true)
                        : $this->log_viewer->getFiles(true);
            foreach ($files as $file) {
                app('files')->delete($this->log_viewer->pathToLogFile($file));
            }
            return $this->redirect($this->request->url());
        }
        return false;
    }

    private function pathFromInput($input_string)
    {
        return $this->log_viewer->pathToLogFile(\Crypt::decrypt($this->request->input($input_string)));
    }

    private function redirect($to)
    {
        if (function_exists('redirect')) {
            return redirect($to);
        }
        return app('redirect')->to($to);
    }

    private function download($data)
    {
        if (function_exists('response')) {
            return response()->download($data);
        }
    }
}
