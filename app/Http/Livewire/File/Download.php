<?php

namespace App\Http\Livewire\File;

use Livewire\Component;

class Download extends Component
{
    public object $file;
    public object $user;
    # time properties
    public int $time;
    public int $endTime;
    public int $startTime;

    public string $error;
    # password properties
    public bool $hasPassword = false;
    public string $password = '';

    public function mount(object $file, object $user) {
        $this->file = $file;
        $this->user = $user;
        $this->startTime = time();
        $this->endTime = $this->startTime + 60;
    }

    public function render()
    {
        $this->fileHasPassword();
        $this->getTimeProperty();
        
        return view('livewire.file.download');
    }

    /**
     * Get time to download
     * @return int
     */
    public function getTimeProperty() {
        $this->time = $this->endTime - time();
        if ($this->time <= 0) {
            $this->time = 0;
        }
        return $this->time;
    }

    /**
     * Download file && password operations
     */
    public function download() {
        if ($this->time != 0) {
            return;
        }
        if ($this->hasPassword){
            if ($this->password === $this->file->password) {
                $this->error = '';
                $filename = 'uploads/'.$this->user->username.'/'.$this->file->name.'.'.$this->file->type;
                return response()->download($filename);
            } else {
                $this->error = 'Password is incorrect.';
            }
        } else {
            $this->error = '';
            $filename = 'uploads/'.$this->user->username.'/'.$this->file->name.'.'.$this->file->type;
            return response()->download($filename);
        }
        
        
    }

    /**
     * Check the file have password
     */
    public function fileHasPassword() {
        if ($this->file->password != null) {
            $this->hasPassword = true;
        } else {
            $this->hasPassword = false;
        }
    }
}
