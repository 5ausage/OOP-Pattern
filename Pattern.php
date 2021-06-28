<?php

interface MusicInterface
{
	public function play();
}

class Track implements MusicInterface
{
	public $title, $artist, $path;

	public function __construct(string $title, string $artist, string $path)
	{
		$this->title = $title;
		$this->artist = $artist;
		$this->path = $path;
	}

	public function play(): string
	{
		return $this->path;
	}
}

class Playlist implements MusicInterface
{
	protected $tracks = [];
	protected $currentTrack = 0;

	public function addTrack(MusicInterface $track):bool
	{
		$this->tracks[] = $track;
		return true;
	}

	public function deleteTrack($path)
	{
		$key = array_search($path, array_column($this->tracks, 'path'), true);
		unset($this->tracks[$key]);
	}

	public function play():string
	{
		return $this->tracks[$this->currentTrack]->play();
	}

	public function next():string
	{
		if(isset($this->tracks[$this->currentTrack + 1]))
		{
			$this->currentTrack++;
		}
		return $this->play();
	}

	public function previous():string
	{
		if($this->currentTrack > 0)
		{
			$this->currentTrack--;
			return $this->play();
		}
		return $this->play();
	}
}

$Ivan = new Playlist();
$Ivan -> addTrack(new Track('first song','ivan','/music/first song.mp3'));
$Ivan -> addTrack(new Track('second song','andrew','/music/second song.mp3'));
$Ivan -> addTrack(new Track('third song','denis','/music/third song.mp3'));
//$Ivan -> deleteTrack('/music/third song.mp3');
print_r($Ivan);
echo $Ivan->play().PHP_EOL;
echo $Ivan->next().PHP_EOL;
echo $Ivan->next().PHP_EOL;
echo $Ivan->previous().PHP_EOL;
