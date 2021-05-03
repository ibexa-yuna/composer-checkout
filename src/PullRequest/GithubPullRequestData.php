<?php


namespace MarekNocon\ComposerCheckout\PullRequest;

class GithubPullRequestData
{
    public $owner;

    public $package;

    public $id;

    public function __construct(string $owner, string $package, string $id)
    {
        $this->owner = $owner;
        $this->package = $package;
        $this->id = $id;
    }

    public static function fromUrl(string $pullRequestUrl)
    {
        $matches = [];
        preg_match('/.*github.com\/(.*)\/(.*)\/pull\/(\d+).*/', $pullRequestUrl, $matches);
        [, $owner, $repository, $prNumber] = $matches;

        return new self($owner, $repository, $prNumber);
    }
}